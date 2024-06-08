<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailUserModel;
use App\Models\Kota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $data = [
      'users' => User::all(),
    ];
    return view('admin.user.index', $data);
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
    $user = User::find($id);
    $kota = Kota::all();
    return view('admin.user.edit', compact('user', 'kota'));
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
      'nama' => 'required',
      'nomor' => 'required',
      'email' => 'required',
      'jk' => 'required',
      'alamat' => 'required',
      'kota' => 'required',
    ]);

    try {
      DB::beginTransaction();

      $user = User::findOrFail($id);
      $user->nama = $request->nama;
      $user->nomor_hp = $request->nomor;
      $user->save();

      $detailUser = DetailUserModel::where('id_user', $id)->first(); // Cari data, jangan gunakan firstOrFail()

      if ($detailUser) {
        // Jika data ada, lakukan update
        $detailUser->id_kota = $request->kota;
        $detailUser->email = $request->email;
        $detailUser->jk = $request->jk;
        $detailUser->alamat = $request->alamat;
        $detailUser->save();
      } else {
        // Jika data tidak ada, buat data baru
        $detailUser = new DetailUserModel([
          'id_user' => $id,
          'id_kota' => $request->kota,
          'email' => $request->email,
          'jk' => $request->jk,
          'alamat' => $request->alamat,
        ]);
        $detailUser->save();
      }

      DB::commit();

      flash()->addSuccess("Data berhasil diupdate");
      return redirect()->to(route('admin.users.index'));
    } catch (\Throwable $th) {
      DB::rollback();
      Log::info("ERROR UPDATE DATA USER ADMIN " . $th->getMessage());
      flash()->addError("Data gagal di update, Tejadi kesalahan pada server !");
      return redirect()->back();
    }


    // dd($request->all());



    // Validasi data input
    // $validator = Validator::make($request->all(), [
    //   'type' => 'required',
    //   'harga' => 'integer',
    // ]);

    // if ($validator->fails()) {
    //   flash()->addError("Inputkan semua data dengan benar!");
    //   return redirect()->back();
    // }

    // try {
    //   $typeSlik = TypeSlik::find($id);
    //   $typeSlik->nama = $request->input('type');
    //   $typeSlik->harga = $request->input('harga') ?? 0;

    //   $typeSlik->save();

    //   flash()->addSuccess("Data berhasil diupdate");
    //   return redirect()->back();
    // } catch (\Throwable $th) {
    //   throw $th;
    //   flash()->addError("Data gagal di update");
    //   return redirect()->back();
    // }
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
      $user = User::findOrFail($id);
      $user->delete();
      return response()->json([
        'success' => true,
        'message' => 'Data berhasil dihapus',
      ]);
    } catch (\Throwable $th) {
      Log::error("ERROR DELETE DATA USER ADMIN " . $th->getMessage());
      return response()->json([
        'success' => false,
        'message' => 'Terjadi kesalahan saat menghapus data',
      ], 500); // Status code 500 untuk server error
    }
  }
  // $slik = TypeSlik::findOrFail($id);
  // try {

  //   $slik->delete();
  //   flash()->addSuccess("Berhasil menghapus data!");
  //   return redirect()->back();
  // } catch (\Throwable $th) {
  //   flash()->addError("Tidak bisa dihapus karena data digunakan oleh data lain!");
  //   return redirect()->back();
  // }
}
