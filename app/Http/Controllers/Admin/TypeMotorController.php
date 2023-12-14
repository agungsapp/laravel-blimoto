<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TypeMotorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $data = Type::orderBy('id', 'desc')->get();
    return view('admin.type.index', [
      'types' => $data
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
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
      $lowercaseName = strtolower($request->input('nama'));

      // Check if the type with the given lowercase name already exists
      $existingType = Type::whereRaw('LOWER(nama) = ?', [$lowercaseName])->first();

      if ($existingType) {
        flash()->addError("Type motor dengan nama $request->nama sudah ada!");
        return redirect()->back()->withInput();
      }

      // Create a new type only if it doesn't exist
      $type = Type::create([
        'nama' => $lowercaseName,
      ]);

      flash()->addSuccess("Type motor $type->nama berhasil dibuat");
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
    $type = Type::findOrFail($id);

    // Update the Type model
    $type->nama = $request->nama_edit;
    $type->save();

    // Redirect back with a success message
    flash()->addSuccess("Berhasil merubah type motor!");
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
      $type = Type::findOrFail($id);
      $type->delete();
      flash()->addSuccess("Berhasil menghapus type motor!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("$type->name tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }
}
