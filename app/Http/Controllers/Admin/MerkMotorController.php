<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MerkMotorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $search = $request->get('search');
    $data = Merk::where('nama', 'LIKE', "%{$search}%")
      ->orderByDesc('id')
      ->paginate(10);
    return view('admin.merk.index', [
      'merks' => $data
    ]);
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
      // Check if the record already exists
      $existingMerk = Merk::whereRaw('LOWER(nama) = ?', [strtolower($request->input('nama'))])->first();

      if ($existingMerk) {
        // Data already exists, show an alert
        flash()->addWarning("Merk motor dengan nama $existingMerk->nama sudah ada!");
        return redirect()->back()->withInput();
      }

      // Data does not exist, create a new record
      $merk = Merk::create([
        'nama' => strtolower($request->input('nama')),
      ]);

      flash()->addSuccess("Merk motor $merk->nama berhasil dibuat");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Gagal membuat data pastikan sudah benar!");
      return redirect()->back();
    }
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
    $merk = Merk::findOrFail($id);

    // Update the merk model
    $merk->nama = $request->nama_edit;
    $merk->save();

    // Redirect back with a success message
    flash()->addSuccess("Berhasil merubah merk motor!");
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
      $merk = Merk::findOrFail($id);
      $merk->delete();
      flash()->addSuccess("Berhasil menghapus merk motor!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("$merk->name tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }
}
