<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminDataPembayaranController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $data = Penjualan::with('motor', 'leasing', 'hasil', 'kota', 'sales', 'pembayaran', 'refund', 'detailPembayaran')
      ->where('status_pembayaran_dp', '=', 'success')
      ->orderBy('id', 'desc')
      ->get();
    return view('admin.data-pembayaran.index', [
      'penjualan' => $data
    ]);
  }

  public function belumBayar(Request $request)
  {
    // dd(env('MIDTRANS_CLIENT_KEY'));

    $data = Penjualan::with('motor', 'leasing', 'hasil', 'kota', 'sales')
      ->whereNotIn('status_pembayaran_dp', ['success', 'cod'])
      ->orderBy('id', 'desc')
      ->get();
    return view('admin.data-pembayaran.belum', [
      'penjualan' => $data
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
      'nama' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    try {
      // Check if the city already exists
      $existingCity = Kota::whereRaw('LOWER(nama) = LOWER(?)', [$request->input('nama')])->first();

      if ($existingCity) {
        flash()->addError("Kota {$existingCity->nama} sudah ada!");
        return redirect()->back()->withInput();
      }

      // If not, create a new city
      $kota = Kota::create([
        'nama' => $request->input('nama')
      ]);

      flash()->addSuccess("Kota $kota->nama berhasil dibuat");
      return redirect()->back();
    } catch (\Throwable $th) {
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
    // return 
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
      'nama_edit' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    // Find the Type model by id
    $type = Kota::findOrFail($id);

    // Update the Type model
    $type->nama = $request->nama_edit;
    $type->save();

    // Redirect back with a success message
    flash()->addSuccess("Berhasil merubah kota!");
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
      $type = Kota::findOrFail($id);
      $type->delete();
      flash()->addSuccess("Berhasil menghapus kota!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("$type->name tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }
}
