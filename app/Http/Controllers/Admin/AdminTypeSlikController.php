<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slik;
use App\Models\TypeSlik;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class AdminTypeSlikController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $data = [
      'slik' => TypeSlik::all(),
    ];

    return view('admin.type-slik.index', $data);
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
      'type' => 'required',
      'harga' => 'integer',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      TypeSlik::create([
        'nama' => $request->input('type'),
        'harga' => $request->input('harga') ?? 0,
      ]);

      flash()->addSuccess("Berhasil menambah data");
      return redirect()->back();
    } catch (\Throwable $th) {
      throw $th;
      flash()->addError("Error silahkan coba beberapa saat lagi");
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
    // Validasi data input
    $validator = Validator::make($request->all(), [
      'type' => 'required',
      'harga' => 'integer',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    try {
      $typeSlik = TypeSlik::find($id);
      $typeSlik->nama = $request->input('type');
      $typeSlik->harga = $request->input('harga') ?? 0;

      $typeSlik->save();

      flash()->addSuccess("Data berhasil diupdate");
      return redirect()->back();
    } catch (\Throwable $th) {
      throw $th;
      flash()->addError("Data gagal di update");
      return redirect()->back();
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $slik = TypeSlik::findOrFail($id);
    try {

      $slik->delete();
      flash()->addSuccess("Berhasil menghapus data!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }
}
