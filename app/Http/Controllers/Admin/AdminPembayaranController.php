<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\Kota;
use App\Models\LeasingMotor;
use App\Models\Motor;
use App\Models\Pembayaran;
use App\Models\Penjualan;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminPembayaranController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$data = Penjualan::with('motor', 'leasing', 'hasil', 'kota', 'sales')
			->orderBy('id', 'desc')
			->get();
		$kota = Kota::all();
		$hasil = Hasil::all();
		$motor = Motor::all();
		$leasing = LeasingMotor::all();
		$sales = Sales::all();

		return view('admin.pembayaran.index', [
			'penjualan' => $data,
			'kota' => $kota,
			'hasil' => $hasil,
			'motor' => $motor,
			'leasing' => $leasing,
			'sales' => $sales,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'konsumen' => 'required',
			'sales' => 'required',
			'dp' => 'required',
			'id_penjualan' => 'required',
		]);

		if ($validator->fails()) {
			flash()->addError("Inputkan semua data dengan benar!");
			return redirect()->back()->withInput();
		}

		DB::beginTransaction();
		try {
			$penjualan = Penjualan::where('id', $request->id_penjualan)
				->where('nama_konsumen', $request->konsumen)
				->where('id_sales', $request->sales)
				->first();

			if (!$penjualan) {
				flash()->addError("Data penjualan tidak ditemukan!");
				return redirect()->back()->withInput();
			}

			// Menggunakan metode create untuk membuat pembayaran baru
			$pembayaran = Pembayaran::create([
				'id_penjualan' => $request->id_penjualan,
				'harga' => $request->dp
			]);

			// Konfigurasi Midtrans
			\Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
			\Midtrans\Config::$isProduction = false;
			\Midtrans\Config::$isSanitized = true;
			\Midtrans\Config::$is3ds = false;


			// Mempersiapkan data transaksi

			$transactionDetails = [
				'order_id' => $pembayaran->id_penjualan,
				'gross_amount' => $pembayaran->harga,
			];

			// Membuat transaksi ke Midtrans
			$transaction = [
				'transaction_details' => $transactionDetails,
				// Anda dapat menambahkan data customer, item_details, dll.
			];

			$snapToken = \Midtrans\Snap::getSnapToken($transaction);
			$snapUrl = \Midtrans\Snap::createTransaction($transaction)->redirect_url;
			DB::commit();

			return redirect()->away($snapUrl);
		} catch (\Exception $e) {
			DB::rollback();
			// throw $e;
			flash()->addError("Data penjualan tidak ditemukan!");
			return redirect()->back()->withInput();
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
	}

	public function midtransWebhook(Request $request)
	{
		// Validasi Signature Key (opsional, untuk keamanan tambahan)
		$signatureKey = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . env('MIDTRANS_SERVER_KEY'));
		if ($signatureKey != $request->signature_key) {
			return response()->json(['message' => 'Invalid signature',], 403);
		}

		// Mengolah data notifikasi
		$data = json_decode($request->getContent(), true);

		// Mendapatkan ID pembayaran dari order ID
		$orderId = $data['order_id'];

		// Mencari pembayaran yang berkaitan
		$pembayaran = Pembayaran::where('id_penjualan', $orderId)->first();
		$penjualan = Penjualan::where('id', $orderId)->first();

		if (!$pembayaran) {
			return response()->json(['message' => 'Pembayaran tidak ditemukan'], 404);
		}

		if (!$penjualan) {
			return response()->json(['message' => 'Pembayaran tidak ditemukan'], 404);
		}

		try {
			// Memperbarui status pembayaran berdasarkan notifikasi dari Midtrans
			switch ($data['transaction_status']) {
				case 'capture':
					// Untuk tipe pembayaran kartu kredit
					if ($data['fraud_status'] == 'accept') {
						$pembayaran->update(['status_pembayaran' => 'success']);
						$penjualan->update(['status_pembayaran_dp' => 'success']);
					}
					break;
				case 'settlement':
					// Untuk tipe pembayaran selain kartu kredit
					$pembayaran->update(['status_pembayaran' => 'success']);
					$penjualan->update(['status_pembayaran_dp' => 'success']);
					break;
				case 'pending':
					$pembayaran->update(['status_pembayaran' => 'pending']);
					$penjualan->update(['status_pembayaran_dp' => 'pending']);
					break;
				case 'deny':
					$pembayaran->update(['status_pembayaran' => 'denied']);
					$penjualan->update(['status_pembayaran_dp' => 'denied']);
					break;
				case 'expire':
					$pembayaran->update(['status_pembayaran' => 'expired']);
					$penjualan->update(['status_pembayaran_dp' => 'expired']);
					break;
				case 'cancel':
					$pembayaran->update(['status_pembayaran' => 'cancelled']);
					$penjualan->update(['status_pembayaran_dp' => 'cancelled']);
					break;
				case 'refund':
					// Jika ada pembatalan dan pengembalian dana
					$pembayaran->update(['status_pembayaran' => 'refunded']);
					$penjualan->update(['status_pembayaran_dp' => 'refunded']);
					break;
				case 'partial_refund':
					// Jika ada pengembalian dana sebagian
					$pembayaran->update(['status_pembayaran' => 'partially_refunded']);
					$penjualan->update(['status_pembayaran_dp' => 'partially_refunded']);
					break;
				case 'chargeback':
					// Jika ada penarikan balik pembayaran oleh bank atau penyedia kartu kredit
					$pembayaran->update(['status_pembayaran' => 'chargeback']);
					$penjualan->update(['status_pembayaran_dp' => 'chargeback']);
					break;
				default:
					$pembayaran->update(['status_pembayaran' => 'unknown']);
					$penjualan->update(['status_pembayaran_dp' => 'unknown']);
					break;
			}
			return response()->json(['message' => 'Webhook berhasil diproses']);
		} catch (\Exception $e) {
			Log::error('Midtrans Webhook Error: ' . $e->getMessage());
			return response()->json(['message' => 'Terjadi kesalahan saat memproses webhook'], 500);
		}
	}
}
