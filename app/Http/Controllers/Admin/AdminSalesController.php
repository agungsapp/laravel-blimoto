<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminSalesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $data = Sales::all();
    return view('admin.sales.index', [
      'sales' => $data
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
      'kode' => 'required',
      'username' => 'required',
      'password' => 'required',
    ], [
      'username.unique' => 'The username has already been taken.',
    ]);

    if ($validator->fails()) {
      flash()->addError($validator->errors()->first());
      return redirect()->back()->withInput();
    }

    $usernameLower = strtolower($request->input('username'));
    $nipLower = strtolower($request->input('kode'));

    // Check for uniqueness of 'username' and 'nip' using a single query (case-insensitive)
    $existingSales = Sales::whereRaw('LOWER(username) = ?', [$usernameLower])
      ->orWhereRaw('LOWER(nip) = ?', [$nipLower])
      ->first();

    if ($existingSales) {
      flash()->addError('Username atau NIP sudah digunakan!.');
      return redirect()->back()->withInput();
    }

    try {
      $sales = Sales::create([
        'nama' => $request->input('nama'),
        'nip' => $request->input('kode'),
        'username' => $request->input('username'),
        'password' => Hash::make($request->input('password')),
      ]);

      flash()->addSuccess("Sales $sales->nama berhasil dibuat");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Gagal membuat data pastikan sudah benar!");
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
    $validator = Validator::make($request->all(), [
      'nama' => 'required',
      'kode' => 'required',
      'username' => 'required',
      'password_old' => 'required',
    ]);

    $password = $request->input('password') ? Hash::make($request->input('password')) : $request->input('password_old');

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    $sales = Sales::findOrFail($id);

    $sales->nama = $request->nama;
    $sales->username = $request->username;
    $sales->nip = $request->kode;
    $sales->password = $request->filled('password') ? Hash::make($request->input('password')) : $request->input('password_old');
    $sales->save();

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
      $type = Sales::findOrFail($id);
      $type->delete();
      flash()->addSuccess("Berhasil menghapus data!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("$type->name tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }
}
