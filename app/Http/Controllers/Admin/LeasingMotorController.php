<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeasingMotor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeasingMotorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $dataLeasing = LeasingMotor::all();
    return view('admin.leasing.index', [
      'leasings' => $dataLeasing
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
      'diskon' => 'required',
      'gambar' => 'required|mimes:jpeg,png,jpg,webp',
    ]);

    $diskon = $request->input('diskon');
    if (strpos($diskon, '%') !== false) {
      $diskon = (float)rtrim($diskon, '%') / 100;
    }

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    try {
      $gambar = $request->file('gambar');

      $waktu = Carbon::now();
      $gambarName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();

      $gambar->move(public_path('assets/images/custom/leasing/'), $gambarName);

      $leasing = LeasingMotor::create([
        'nama' => $request->input('nama'),
        'diskon' => $diskon,
        'gambar' => $gambarName
      ]);
      flash()->addSuccess("Leasing $leasing->nama berhasil dibuat");
      return redirect()->back();
    } catch (\Throwable $th) {
      throw $th;
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
      'nama' => 'required',
      'gambar' => 'nullable|mimes:jpeg,png,jpg,webp'
    ]);

    $diskon = $request->input('diskon');
    if (strpos($diskon, '%') !== false) {
      $diskon = (float)rtrim($diskon, '%') / 100;
    }

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    try {
      $leasing = LeasingMotor::findOrFail($id);
      if ($request->hasFile('gambar')) {

        $gambar = $request->file('gambar');
        $waktu = Carbon::now();
        $gambarName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();

        $gambar->move(public_path('assets/images/custom/leasing/'), $gambarName);

        if ($leasing->gambar) {
          $gambarLama = public_path('assets/images/custom/leasing/' . $leasing->gambar);
          if (file_exists($gambarLama)) {
            unlink($gambarLama);
          }
        }

        $leasing->update([
          'gambar' => $gambarName,
        ]);
      }
      $leasing->nama = $request->nama;
      $leasing->diskon = $diskon;
      $leasing->save();

      // Redirect back with a success message
      flash()->addSuccess("Berhasil merubah leasing!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Gagal memperbarui data pastikan sudah benar!");
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
    try {
      $leasing = LeasingMotor::findOrFail($id);
      $gambarLama = public_path('assets/images/custom/leasing/' . $leasing->gambar);
      if (file_exists($gambarLama)) {
        unlink($gambarLama);
      }
      $leasing->delete();
      flash()->addSuccess("Berhasil menghapus leasing!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("$leasing->name tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }
}
