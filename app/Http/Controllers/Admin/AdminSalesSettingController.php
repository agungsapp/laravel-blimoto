<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminSalesSettingController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $user = auth('sales')->user();
    $userWithoutPassword = $user->makeHidden('password')->toArray();
    return view('admin.sales-setting.index', [
      'user' => $userWithoutPassword,
    ]);
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
    // Validasi input
    $validator = Validator::make($request->all(), [
      'nama' => 'required',
      'kode' => 'required',
      'username' => 'required',
      'password_lama' => 'required', // Menambahkan validasi untuk password lama
      'password_baru' => 'nullable|min:6', // Validasi untuk password baru jika ada
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $sales = Sales::findOrFail($id);

    // Periksa password lama
    if (!Hash::check($request->password_lama, $sales->password)) {
      flash()->addError("Password salah!");
      return redirect()->back();
    }

    $sales->nama = $request->nama;
    $sales->username = $request->username;
    $sales->nip = $request->kode;

    // Cek jika ada password baru yang dimasukkan
    if ($request->filled('password_baru')) {
      $sales->password = Hash::make($request->password_baru);
    }

    $sales->save();

    // Redirect back with a success message
    flash()->addSuccess("Berhasil merubah data!");
    return redirect()->route('admin.sales-settings.index');
  }
}
