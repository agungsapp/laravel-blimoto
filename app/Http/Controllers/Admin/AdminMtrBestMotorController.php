<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BestMotor;
use App\Models\Motor;
use App\Models\MtrBestMotor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminMtrBestMotorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {

    $motorKategoriMotor = MtrBestMotor::with(['motor', 'bestMotor'])
      ->orderBy('id', 'desc')
      ->get();

    $kategori = BestMotor::all();
    $motor = Motor::all();

    // dd($motorKategoriMotor[0]->motor->nama);
    // $motorKategoriMotor->map(function ($motor) {
    //   $motor->motorNama = $motor->motor->nama;
    // });


    return view('admin.mtr-best-motor.index', [
      'mtrKategori' => $kategori,
      'motor' => $motor,
      'mtrKategoriMotor' => $motorKategoriMotor,
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
      'motor' => 'required',
      'kategori' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    try {
      // Check if the data already exists
      $existingEntry = MtrBestMotor::where('id_motor', $request->input('motor'))
        ->where('id_best_motor', $request->input('kategori'))
        ->first();

      if ($existingEntry) {
        // Data already exists, show a notification
        flash()->addError("Data sudah ada!");
      } else {
        // Data doesn't exist, create a new entry
        MtrBestMotor::create([
          'id_motor' => $request->input('motor'),
          'id_best_motor' => $request->input('kategori'),
        ]);

        flash()->addSuccess("Berhasil dibuat");
      }

      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Gagal membuat data, pastikan sudah benar!");
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
      'motor' => 'required',
      'kategori' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    // Find the best_motor model by id
    $mtrBestMtr = MtrBestMotor::findOrFail($id);

    // Update the mtrBestMtr model
    $mtrBestMtr->id_motor = $request->motor;
    $mtrBestMtr->id_best_motor = $request->kategori;
    $mtrBestMtr->save();

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
      $mtrBestMtr = MtrBestMotor::findOrFail($id);
      $mtrBestMtr->delete();
      flash()->addSuccess("Berhasil menghapus data!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }
}
