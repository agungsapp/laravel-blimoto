<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CicilanMotor;
use App\Models\LeasingMotor;
use App\Models\Motor;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CicilanMotorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
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

  public function getCicilan(Request $request, $id)
  {
    // try {
    //   $cicilanMotor = Motor::findOrFail($id);
    //   return response()->json([
    //     'status' => 'success',
    //     'min_dp' => $cicilanMotor->min_dp
    //   ], 200);
    // } catch (ModelNotFoundException $e) {
    //   return response()->json([
    //     'status' => 'error',
    //     'message' => 'No data found'
    //   ], 404);
    // }
  }

  public function hitungCicilan(Request $request)
  {
    // $validator = Validator::make($request->all(), [
    //   'otr_motor' => 'required',
    //   'tenor' => 'required',
    //   'dp' => 'required',
    // ]);

    // if ($validator->fails()) {
    //   return response()->json([
    //     'status' => 'error',
    //     'message' => $validator->errors()->first()
    //   ], 400);
    // }

    // $leasingMotors = LeasingMotor::all();

    // $otr = $request->otr_motor;
    // $dp = ceil($request->dp);
    // $tenor = $request->tenor;

    // $sisaUtang = $otr - $dp;
    // $totalBunga = ($sisaUtang * ((27 / 100) / 12)) * $tenor;
    // $totalUtang = $sisaUtang + $totalBunga;
    // $cicilanPerBulan = $totalUtang / $tenor;

    // itungan yang lama
    // $sisaUtang = $otr - $dp;
    // $bunga = ($sisaUtang * 0.04) * $tenor;
    // $totalUtang = $sisaUtang + $bunga;
    // $cicilan = $totalUtang / $tenor;
    // $cicilan = ceil($cicilan);

    // $similarMotors = Motor::join('detail_motor', 'motor.id', '=', 'detail_motor.id_motor')
    //   ->where('motor.harga', '>=', $otr - $dp)
    //   ->where('motor.harga', '<=', $otr + $dp)
    //   ->get();

    // $filteredMotors = $similarMotors->filter(function ($motor) use ($otr, $dp, $cicilanPerBulan, $tenor) {
    //   $sisaUtang = $motor->harga - $dp;
    //   $bunga = ($sisaUtang * 0.06) * $tenor;
    //   $totalUtang = $sisaUtang + $bunga;
    //   $cicilanMirip = $totalUtang / $tenor;
    //   $motor->cicilan = ceil($cicilanMirip);

    //   return $cicilanMirip <= $cicilanPerBulan;
    // });

    // foreach ($leasingMotors as $leasingMotor) {
    //   $leasingMotor->diskon = $dp - ($dp * $leasingMotor->diskon);
    // }

    // return response()->json([
    //   'status' => 'success',
    //   'total_pembayaran' => $dp + ($cicilanPerBulan * $tenor),
    //   'cicilan' => ceil($cicilanPerBulan),
    //   'leasing' => $leasingMotors,
    //   'rekomendasi_motor' => $similarMotors,
    //   'similar_motors' => $similarMotors,
    // ], 200);
  }

  public function searchAndRecommend(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'id_lokasi' => 'required',
      'id_motor' => 'required',
      'dp' => 'required',
      'tenor' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'message' => 'inputkan semua data dengan benar',
        'errors' => $validator->errors(),
      ], 403);
    }

    $id_lokasi = $request->input('id_lokasi');
    $id_motor = $request->input('id_motor');
    $dp = $request->input('dp');
    $tenor = $request->input('tenor');

    $query = CicilanMotor::select(
      'cicilan_motor.dp',
      'cicilan_motor.tenor',
      'cicilan_motor.cicilan',
      'leasing_motor.nama as leasing_nama',
      'motor.nama as motor_nama',
      'motor.berat as motor_berat',
      'motor.power as motor_power',
      'motor.harga as motor_harga',
      'motor.deskripsi as motor_deskripsi',
      'motor.fitur_utama as motor_fitur_utama'
    )
      ->join('leasing_motor', 'cicilan_motor.id_leasing', '=', 'leasing_motor.id')
      ->join('motor', 'cicilan_motor.id_motor', '=', 'motor.id')
      ->join('kota', 'cicilan_motor.id_lokasi', '=', 'kota.id')
      ->where('cicilan_motor.id_lokasi', $id_lokasi)
      ->where('cicilan_motor.id_motor', $id_motor)
      ->where('cicilan_motor.tenor', $tenor);

    $results = $query->first();

    if (!$results) {
      return response()->json([
        'message' => 'tidak ada data'
      ], 404);
    }

    $dpRange = $dp * 0.2;
    $cicilanRange = $results->cicilan * 0.2;

    $recommendations = DB::table('cicilan_motor')
      ->select(
        'cicilan_motor.dp',
        'cicilan_motor.tenor',
        'cicilan_motor.cicilan',
        'leasing_motor.nama as leasing_nama',
        'motor.nama as motor_nama',
        'motor.berat as motor_berat',
        'motor.power as motor_power',
        'motor.harga as motor_harga',
        'motor.deskripsi as motor_deskripsi',
        'motor.fitur_utama as motor_fitur_utama'
      )
      ->join('leasing_motor', 'cicilan_motor.id_leasing', '=', 'leasing_motor.id')
      ->join('motor', 'cicilan_motor.id_motor', '=', 'motor.id')
      ->join('kota', 'cicilan_motor.id_lokasi', '=', 'kota.id')
      ->whereBetween('cicilan_motor.dp', [$dp - $dpRange, $dp + $dpRange])
      ->where('cicilan_motor.tenor', $tenor)
      ->whereBetween('cicilan_motor.cicilan', [$results->cicilan - $cicilanRange, $results->cicilan + $cicilanRange])
      ->orderBy('cicilan_motor.cicilan', 'asc')
      ->take(5)
      ->get();

    return response()->json([
      'motor' => $results,
      'rekemondasi' => $recommendations,
    ], 200);
  }
}
