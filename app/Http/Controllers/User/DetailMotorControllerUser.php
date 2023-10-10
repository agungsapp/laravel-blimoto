<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CicilanMotor;
use App\Models\DetailMotor;
use App\Models\LeasingMotor;
use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailMotorControllerUser extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    return view('user.about_us.index');
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
    //
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }

  public function getDetailMotor(Request $request)
  {
    $motorId = $request->input('id-motor');
    $lokasiId = $request->input('id-lokasi');
    $detailMotor  = Motor::select('id', 'id_merk', 'id_type', 'nama', 'harga')
      ->with([
        'merk' => function ($query) {
          $query->select('id', 'nama');
        },
        'type' => function ($query) {
          $query->select('id', 'nama');
        },
        'detailMotor' => function ($query) {
          $query->select('id_motor', 'warna', 'gambar');
        },
      ])
      ->where('stock', 1)
      ->find($motorId);

    $cicilanMotor = CicilanMotor::select('id', 'dp', 'id_leasing')
      ->with([
        'leasingMotor' => function ($query) {
          $query->select('id', 'nama', 'diskon', 'diskon_normal');
        }
      ])
      ->get();
    // ->where('id_lokasi', $lokasiId);



    $data = [
      'motor' => [
        'nama' => $detailMotor->nama,
        'harga' => $detailMotor->harga,
        'merk' => $detailMotor->merk->nama,
        'type' => $detailMotor->type->nama,
        'detail_motor' => $detailMotor->detailMotor,
      ],
      'cicilan_motor' => $cicilanMotor
    ];
    // dd($data);
    return response()->json($cicilanMotor, 200);
  }
}