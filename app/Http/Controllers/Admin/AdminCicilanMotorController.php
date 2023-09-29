<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrosurMotor;
use App\Models\CicilanMotor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminCicilanMotorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data = [
      'cicilan' => CicilanMotor::getCicilanTable()
    ];

    return view('admin.cicilan.index', $data);
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
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
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
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
  }

  public function view(BrosurMotor $brochure)
  {
  }

  public function importCsv(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'file' => 'required|file',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    if (($handle = fopen($request->file('file')->getRealPath(), 'r')) !== false) {
      fgetcsv($handle);

      while (($data = fgetcsv($handle, 1000, ',')) !== false) {
        DB::table('cicilan_motor')->insert([
          'dp' => $data[0],
          'tenor' => $data[1],
          'potongan_tenor' => $data[2],
          'cicilan' => $data[3],
          'id_leasing' => $data[4],
          'id_lokasi' => $data[5],
          'id_motor' => $data[6],
        ]);
      }
      fclose($handle);
    }
    flash()->addSuccess("Data csv berhasil diimport");
    return redirect()->back();
  }

  public function updateCsv(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'file' => 'required|file',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }
    if (DB::table('cicilan_motor')->delete()) {
      echo "<script>console.log('data lama berhasil di hapus')</script>";
    };


    if (($handle = fopen($request->file('file')->getRealPath(), 'r')) !== false) {
      fgetcsv($handle);

      while (($data = fgetcsv($handle, 1000, ',')) !== false) {
        DB::table('cicilan_motor')->insert([
          'dp' => $data[0],
          'tenor' => $data[1],
          'potongan_tenor' => $data[2],
          'cicilan' => $data[3],
          'id_leasing' => $data[4],
          'id_lokasi' => $data[5],
          'id_motor' => $data[6],
        ]);
      }

      fclose($handle);
    }

    flash()->addSuccess("Data csv berhasil diupdate");
    return redirect()->back();
  }
}
