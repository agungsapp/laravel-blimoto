<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\Kota;
use App\Models\LeasingMotor;
use App\Models\Motor;
use App\Models\Penjualan;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
    $data = Penjualan::with('motor', 'leasing', 'hasil', 'kota', 'sales')->get();
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
      'tenor' => 'required',
      'pembayaran' => 'required',
      'kabupaten' => 'required',
      'hasil' => 'required',
      'motor' => 'required',
      'jumlah' => 'required',
      'catatan' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    $tanggal_dibuat = Carbon::today();
    try {
      $penjualan = Penjualan::create([
        'nama_konsumen' => $request->input('konsumen'),
        'tenor' => $request->input('tenor'),
        'pembayaran' => $request->input('pembayaran'),
        'id_sales' => $request->input('sales'),
        'id_kota' => $request->input('kabupaten'),
        'id_hasil' => $request->input('hasil'),
        'id_motor' => $request->input('motor'),
        'jumlah' => $request->input('jumlah'),
        'id_lising' => $request->input('leasing') ?? null,
        'catatan' => $request->input('catatan'),
        'tanggal_dibuat' => $tanggal_dibuat,
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
      'tenor' => 'required',
      'pembayaran' => 'required',
      'kabupaten' => 'required',
      'hasil' => 'required',
      'motor' => 'required',
      'jumlah' => 'required',
      'catatan' => 'required',
      'tanggal_dibuat' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    $penjualan = Penjualan::findOrFail($id);

    $tanggal_dibuat = \Carbon\Carbon::createFromFormat('m/d/Y', $request->input('tanggal_dibuat'))->format('Y-m-d');
    $tanggal_hasil = $request->input('tanggal_hasil') ? \Carbon\Carbon::createFromFormat('m/d/Y', $request->input('tanggal_hasil'))->format('Y-m-d') : null;

    $penjualan->nama_konsumen = $request->input('konsumen');
    $penjualan->tenor = $request->input('tenor');
    $penjualan->pembayaran = $request->input('pembayaran');
    $penjualan->id_sales = $request->input('sales');
    $penjualan->jumlah = $request->input('jumlah');
    $penjualan->catatan = $request->input('catatan');
    $penjualan->tanggal_dibuat = $tanggal_dibuat;
    $penjualan->tanggal_hasil = $tanggal_hasil;
    $penjualan->id_lising = $request->input('leasing') ?? null;
    $penjualan->id_motor = $request->input('motor');
    $penjualan->id_kota = $request->input('kabupaten');
    $penjualan->id_hasil = $request->input('hasil');

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
}
