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
use Illuminate\Support\Facades\Storage;
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
	public function store(Request $request, $id_penjualan)
	{
		$validator = Validator::make($request->all(), [
			'konsumen' => 'required',
			'email' => 'required',
			'sales' => 'required',
			'dp' => 'required',
		]);

		$idSales = intval($request->input('sales'));
		$idPenjualan = intval($id_penjualan);
		$namaKonsumen = $request->input('konsumen');

		if ($validator->fails()) {
			return response()->json(['pesan' => 'Inputkan semua data dengan benar!'], 400);
		}

		// dd($request->all());
		DB::beginTransaction();
		try {
			$penjualan = Penjualan::where('id', $idPenjualan)
				->where(function ($query) use ($namaKonsumen) {
					$query->whereRaw('LOWER(nama_konsumen) = ?', [strtolower($namaKonsumen)]);
				})
				->where('id_sales', $idSales)
				->first();

			if (!$penjualan) {
				return response()->json(['pesan' => 'data penjualan tidak ditemukan'], 404);
			}

			// Menggunakan metode create untuk membuat pembayaran baru
			$pembayaran = Pembayaran::create([
				'id_penjualan' => $idPenjualan,
				'harga' => $request->dp
			]);

			// Konfigurasi Midtrans
			\Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
			\Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
			\Midtrans\Config::$isSanitized = true;
			\Midtrans\Config::$is3ds = false;


			// Create a unique order_id by appending a timestamp or a unique string to id_penjualan
			$uniqueOrderId = $pembayaran->id_penjualan . '-' . time();

			$transactionDetails = [
				'order_id' => $uniqueOrderId,
				'gross_amount' => $pembayaran->harga,
			];

			$customerDetails = [
				'first_name' => $namaKonsumen,
				'email' => $request->input('email'),
			];

			// Membuat transaksi ke Midtrans
			$transaction = [
				'transaction_details' => $transactionDetails,
				'customer_details' => $customerDetails,
				// Anda dapat menambahkan data customer, item_details, dll.
			];

			$snapToken = \Midtrans\Snap::getSnapToken($transaction);
			$snapUrl = \Midtrans\Snap::createTransaction($transaction)->redirect_url;
			DB::commit();

			// return redirect()->away($snapUrl);
			return response()->json(['redirect_url' => $snapUrl]);
			// return response()->json(['snap_token' => $snapToken]);
		} catch (\Exception $e) {
			DB::rollback();
			return response()->json(['pesan' => 'Error coba beberapa saat lagi', 500]);
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


		// debug
		// Menentukan path dan nama file
		$filePath = storage_path('app/public/midtrans_webhook_data.json');

		// Mengubah data menjadi string JSON
		$dataString = json_encode($data, JSON_PRETTY_PRINT);
		// Menyimpan data ke dalam file menggunakan Storage Facade
		Storage::disk('public')->put('midtrans_webhook_data.json', $dataString);
		// debug


		$orderIdParts = explode('-', $data['order_id']);
		// return $data;
		$idPenjualan = $orderIdParts[0]; // Ambil bagian pertama sebagai id_penjualan

		// Mencari pembayaran yang berkaitan
		$pembayaran = Pembayaran::where('id_penjualan', $idPenjualan)->first();
		$penjualan = Penjualan::where('id', $idPenjualan)->first();

		// return $data['payment_type'];
		if (!$pembayaran) {
			return response()->json(['message' => 'Pembayaran tidak ditemukan'], 404);
		}

		if (!$penjualan) {
			return response()->json(['message' => 'Penjualan tidak ditemukan'], 404);
		}

		try {
			// Memperbarui status pembayaran berdasarkan notifikasi dari Midtrans
			switch ($data['transaction_status']) {
				case 'capture':
					// Untuk tipe pembayaran kartu kredit
					if ($data['fraud_status'] == 'accept') {
						$pembayaran->update([
							'status_pembayaran' => 'success',
							'metode_pembayaran' => $data['payment_type'],
							'paid_at' => $data['settlement_time']
						]);
						$penjualan->update(['status_pembayaran_dp' => 'success']);
					}
					break;
				case 'settlement':
					// return "oke";
					// Untuk tipe pembayaran selain kartu kredit
					// $pembayaran->update(['status_pembayaran' => 'success']);
					$pembayaran->update([
						'status_pembayaran' => 'success',
						'metode_pembayaran' => $data['payment_type'],
						'paid_at' => $data['settlement_time']
					]);
					$penjualan->update(['status_pembayaran_dp' => 'success']);
					break;
				case 'pending':
					$pembayaran->update(['status_pembayaran' => 'pending', 'paid_at' => $data['settlement_time']]);
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
			return response()->json(['message' => 'Webhook berhasil diproses'], 200);
		} catch (\Exception $e) {
			Log::error('Midtrans Webhook Error: ' . $e->getMessage());
			return response()->json(['message' => 'Terjadi kesalahan saat memproses webhook'], 500);
		}
	}
}
