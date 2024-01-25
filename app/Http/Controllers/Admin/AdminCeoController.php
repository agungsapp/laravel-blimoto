<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ceo;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminCeoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $data = Ceo::orderBy('id', 'desc')->get();
    return view('admin.ceo.index', [
      'ceo' => $data
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

    // Check for uniqueness of 'username' and 'nip' using a single query (case-insensitive)
    $existingSales = Ceo::whereRaw('LOWER(username) = ?', [$usernameLower])
      ->first();

    if ($existingSales) {
      flash()->addError('Username sudah digunakan!.');
      return redirect()->back()->withInput();
    }

    try {
      $sales = Ceo::create([
        'nama' => $request->input('nama'),
        'username' => $request->input('username'),
        'password' => Hash::make($request->input('password')),
      ]);

      flash()->addSuccess("CEO $sales->nama berhasil dibuat");
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
      'username' => 'required',
      'password_old' => 'required',
    ]);

    $password = $request->input('password') ? Hash::make($request->input('password')) : $request->input('password_old');

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    $sales = Ceo::findOrFail($id);

    $sales->nama = $request->nama;
    $sales->username = $request->username;
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
      $type = Ceo::findOrFail($id);
      $type->delete();
      flash()->addSuccess("Berhasil menghapus data!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("$type->name tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }
}
