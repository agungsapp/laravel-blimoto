<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminHasilController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $data = Hasil::orderBy('id', 'desc')->get();
    return view('admin.penjualan.hasil', [
      'hasil' => $data
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
      'hasil' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    try {
      $existingResult = Hasil::where('hasil', strtolower($request->input('hasil')))->first();

      if ($existingResult) {
        flash()->addError("Data sudah ada!");
        return redirect()->back();
      }

      $hasil = Hasil::create([
        'hasil' => strtolower($request->input('hasil')),
      ]);
      flash()->addSuccess("hasil $hasil->hasil berhasil dibuat");
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
      'hasil' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    $hasil = Hasil::findOrFail($id);

    $hasil->hasil = $request->hasil;
    $hasil->save();

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
      $hasil = Hasil::findOrFail($id);
      $hasil->delete();
      flash()->addSuccess("Berhasil menghapus data!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("$hasil->hasil tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }
}
