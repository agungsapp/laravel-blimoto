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
use Illuminate\Support\Facades\Validator;

class AdminPenjualanController extends Controller
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

    return view('admin.penjualan.penjualan', [
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
    //
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
      'metode_pembelian' => 'required',
      'dp' => 'required',
      'kabupaten' => 'required',
      'hasil' => 'required',
      'motor' => 'required',
      'jumlah' => 'required',
      'status_pembayaran' => 'required',
      'metode_pembayaran' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withInput();
    }

    $tanggal_dibuat = Carbon::today();
    $pembelian = $request->input('metode_pembelian');
    $warna_motor = $request->input('warna_motor') ?? null;
    $tenor = $pembelian === 'cash' ? 0 : $request->tenor;
    $catatan = $request->catatan ?? '-';
    $nomorPo = $request->nomor_po ?? null;

    try {


      $penjualan = Penjualan::create([
        'nama_konsumen' => $request->input('konsumen'),
        'jumlah' => $request->input('jumlah'),
        'catatan' => $catatan,
        'tenor' => $tenor,
        'metode_pembelian' => $pembelian,
        'metode_pembayaran' => $request->input('metode_pembayaran'),
        'warna_motor' => $warna_motor,
        'no_hp' => $request->input('no_hp') ?? null,
        'bpkb' => $request->input('bpkb') ?? null,
        'dp' => $request->input('dp'),
        'diskon_dp' => $request->input('diskon_dp'),
        'status_pembayaran_dp' => $request->input('status_pembayaran'),
        'tanggal_dibuat' => $tanggal_dibuat,
        'no_po' => $nomorPo,
        'id_sales' => $request->input('sales'),
        'id_kota' => $request->input('kabupaten'),
        'id_hasil' => $request->input('hasil'),
        'id_motor' => $request->input('motor'),
        'id_lising' => $request->input('leasing') ?? null,
      ]);
      flash()->addSuccess("Penjualan $penjualan->nama_sales berhasil dibuat");
      return redirect()->back();
    } catch (\Throwable $th) {
      throw $th;
      flash()->addError("Gagal membuat data pastikan sudah benar!");
      return redirect()->back();
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
    $validator = Validator::make($request->all(), [
      'konsumen' => 'required',
      'sales' => 'required',
      'metode_pembelian' => 'required',
      'kabupaten' => 'required',
      'hasil' => 'required',
      'motor' => 'required',
      'jumlah' => 'required',
      'dp' => 'required',
      'tanggal_dibuat' => 'required',
      'status_pembayaran_dp' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    $penjualan = Penjualan::findOrFail($id);

    $tanggal_dibuat = \Carbon\Carbon::createFromFormat('m/d/Y', $request->input('tanggal_dibuat'))->format('Y-m-d');
    $tanggal_hasil = $request->input('tanggal_hasil') ? \Carbon\Carbon::createFromFormat('m/d/Y', $request->input('tanggal_hasil'))->format('Y-m-d') : null;
    $pembelian = $request->input('metode_pembelian');
    $tenor = $pembelian === 'cash' ? 0 : $request->tenor;
    $catatan = $request->catatan ?? '-';
    $leasing = $pembelian === 'cash' ? null : $request->leasing;
    $nomorPo = $request->nomor_po ?? null;
    $warna = $request->warna_motor ?? null;
    $bpkb = $request->bpkb ?? null;
    $no_hp = $request->no_hp ?? null;

    $penjualan->nama_konsumen = $request->input('konsumen');
    $penjualan->tenor = $tenor;
    $penjualan->metode_pembelian = $pembelian;
    $penjualan->metode_pembayaran = $request->input('metode_pembayaran');
    $penjualan->id_sales = $request->input('sales');
    $penjualan->jumlah = $request->input('jumlah');
    $penjualan->catatan = $catatan;
    $penjualan->tanggal_dibuat = $tanggal_dibuat;
    $penjualan->tanggal_hasil = $tanggal_hasil;
    $penjualan->status_pembayaran_dp = $request->input('status_pembayaran_dp');
    $penjualan->dp = $request->input('dp');
    $penjualan->diskon_dp = $request->input('diskon_dp');
    $penjualan->id_lising = $leasing;
    $penjualan->id_motor = $request->input('motor');
    $penjualan->id_kota = $request->input('kabupaten');
    $penjualan->id_hasil = $request->input('hasil');
    $penjualan->no_po = $nomorPo;
    $penjualan->bpkb = $bpkb;
    $penjualan->no_hp = $no_hp;
    $penjualan->warna_motor = $warna;

    $penjualan->save();

    // Redirect back with a success message
    flash()->addSuccess("Berhasil merubah data!");
    return redirect()->back();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      $penjualan = Penjualan::findOrFail($id);
      $penjualan->delete();
      flash()->addSuccess("Berhasil menghapus data!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }

  public function bayar(Request $request, $id_penjualan)
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

      $productDetails = [
        [
          'id' => $idPenjualan,
          'quantity' => 1,
          'price' => $pembayaran->harga,
          'name' => 'Pembayaran DP Motor ' . $request->input('motor'),
        ],
      ];

      // Membuat transaksi ke Midtrans
      $transaction = [
        'transaction_details' => $transactionDetails,
        'item_details' => $productDetails,
        'customer_details' => $customerDetails,
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

  public function getPaymentData($id)
  {
    $penjualan = Penjualan::with('sales', 'motor')->findOrFail($id);
    // Tambahkan logika untuk mengambil data tambahan jika diperlukan
    return response()->json($penjualan);
  }

  public function getPrintData($id)
  {
    $penjualan = Penjualan::with(['kota', 'motor'])->findOrFail($id);
    return response()->json($penjualan);
  }

  public function getDataPenjualan($id)
  {
    try {
      $sale = Penjualan::with(['sales', 'kota', 'hasil', 'motor', 'leasing'])->findOrFail($id);
      return response()->json([
        'status' => 'success',
        'data'   => $sale
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'status' => 'error',
        'message' => $e->getMessage()
      ], 404);
    }
  }

  // tambahan meethod import csv
  public function importCsv(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'file' => 'required|file',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    if (($handle = fopen($request->file('file')->getRealPath(), 'r')) !== false) {
      fgetcsv($handle);

      while (($data = fgetcsv($handle, 1000, ',')) !== false) {
        DB::table('penjualan')->insert([
          'nama_konsumen' => $data[0],
          'jumlah' => $data[1],
          'catatan' => $data[2],
          'tenor' => $data[3],
          'metode_pembelian' => $data[4],
          'metode_pembayaran' => $data[5],
          'warna_motor' => $data[6],
          'no_hp' => $data[7],
          'bpkb' => $data[8],
          'dp' => $data[9],
          'diskon_dp' => $data[10],
          'status_pembayaran_dp' => $data[11],
          'tanggal_dibuat' => $data[12],
          'no_po' => $data[13],
          'id_sales' => $data[14],
          'id_kota' => $data[15],
          'id_hasil' => $data[16],
          'id_motor' => $data[17],
          'id_lising' => $data[18],
        ]);
      }
      fclose($handle);
    }
    flash()->addSuccess("Data csv berhasil diimport");
    return redirect()->back();
  }
}
