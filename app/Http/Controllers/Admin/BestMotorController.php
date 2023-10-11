<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BestMotor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BestMotorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $search = $request->get('search');
    $data = DB::table('best_motor')
      ->where('nama', 'LIKE', "%{$search}%")
      ->paginate(10);
    return view('admin.best-motor.index', [
      'best_motors' => $data
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

    $nama = $request->input('nama');
    $lowercaseNama = strtolower($nama);

    $existingMotor = BestMotor::whereRaw("LOWER(nama) = ?", [$lowercaseNama])->first();

    if ($existingMotor) {
      flash()->addError("Nama $nama sudah ada!");
      return redirect()->back();
    }

    
    try {
      $best_motor = BestMotor::create([
        'nama' => $nama
      ]);

      flash()->addSuccess("Kategori $best_motor->nama berhasil dibuat");
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
      'nama_edit' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    // Find the best_motor model by id
    $best_motor = BestMotor::findOrFail($id);

    // Update the best_motor model
    $best_motor->nama = $request->nama_edit;
    $best_motor->save();

    // Redirect back with a success message
    flash()->addSuccess("Berhasil merubah kategori best motor!");
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
      $best_motor = BestMotor::findOrFail($id);
      $best_motor->delete();
      flash()->addSuccess("Berhasil menghapus kategori best motor!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("$best_motor->name tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }
}
