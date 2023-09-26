<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CicilanMotor;
use App\Models\LeasingMotor;
use App\Models\Motor;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
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
    try {
      $cicilanMotor = Motor::findOrFail($id);
      return response()->json([
        'status' => 'success',
        'min_dp' => $cicilanMotor->min_dp
      ], 200);
    } catch (ModelNotFoundException $e) {
      return response()->json([
        'status' => 'error',
        'message' => 'No data found'
      ], 404);
    }
  }

  public function hitungCicilan(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'otr_motor' => 'required',
      'tenor' => 'required',
      'dp' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => 'error',
        'message' => $validator->errors()->first()
      ], 400);
    }

    $leasingMotors = LeasingMotor::all();

    $otr = $request->otr_motor;
    $dp = $request->dp;
    $tenor = $request->tenor;

    $sisaUtang = $otr - $dp;
    $bunga = ($sisaUtang * 0.04) * $tenor;
    $totalUtang = $sisaUtang + $bunga;
    $cicilan = $totalUtang / $tenor;
    $cicilan = ceil($cicilan);

    $similarMotors = Motor::join('detail_motor', 'motor.id', '=', 'detail_motor.id_motor')
      ->where('motor.harga', '>=', $otr - $dp)
      ->where('motor.harga', '<=', $otr + $dp)
      ->get();

    $filteredMotors = $similarMotors->filter(function ($motor) use ($otr, $dp, $cicilan, $tenor) {
      $sisaUtang = $motor->harga - $dp;
      $bunga = ($sisaUtang * 0.04) * $tenor;
      $totalUtang = $sisaUtang + $bunga;
      $cicilanMirip = $totalUtang / $tenor;
      $motor->cicilan = ceil($cicilanMirip);

      return $cicilanMirip <= $cicilan;
    });

    foreach ($leasingMotors as $leasingMotor) {
      $leasingMotor->diskon = $dp - ($dp * $leasingMotor->diskon);
    }

    return response()->json([
      'status' => 'success',
      'total_pembayaran' => $dp + ($cicilan * $tenor),
      'cicilan' => $cicilan,
      'leasing' => $leasingMotors,
      'rekomendasi_motor' => $filteredMotors
    ], 200);
  }
}
