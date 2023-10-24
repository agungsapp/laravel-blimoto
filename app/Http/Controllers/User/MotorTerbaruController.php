<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Merk;
use App\Models\Motor;
use App\Models\MotorKota;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class MotorTerbaruController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $motorData =  Motor::with('merk', 'type', 'detailMotor')
      ->orderBy('motor.updated_at', 'desc')
      ->paginate(8);

    return view('user.motor_terbaru.index', [
      'data' => $motorData,
      'merks' => Merk::all(),
      'types' => Type::all()
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

  public function getMotorTinggiRendah(Request $request)
  {
    // $motor = Motor::all();
    $motorTermahal = Motor::with('merk', 'type', 'detailMotor')
      ->orderBy('motor.harga', 'desc')
      ->paginate(8);

    // return response()->json($motorTermahal);
    // dd($motorTermahal);
    return view('user.motor_terbaru.index', ['data' => $motorTermahal]);
  }

  public function getMotorRendahTinggi()
  {

    $motorTermurah = Motor::with('merk', 'type', 'detailMotor')
      ->orderBy('motor.harga', 'asc')
      ->paginate(8);

    // return response()->json($motorTermurah);
    return view('user.motor_terbaru.index', ['data' => $motorTermurah]);
  }

  public function getMotorTerbaru(Request $request)
  {
    $motorData =  Motor::with('merk', 'type', 'detailMotor')
      ->orderBy('motor.updated_at', 'desc')
      ->paginate(8);

    // return response()->json($motorData);
    return view('user.motor_terbaru.index', ['data' => $motorData]);
  }

  public function getMotorByLocation(Request $request)
  {
    $idKota = intval($request->input('id_kota')) ?: 1;
    $motorData = MotorKota::where('id_kota', $idKota)
      ->with([
        'motor' => function ($query) {
          $query->where('stock', '=', 1)
            ->with([
              'detailMotor' => function ($query) {
                $query->select('id', 'id_motor', 'gambar', 'warna');
              },
              'type' => function ($query) {
                $query->select('id', 'nama');
              },
              'merk' => function ($query) {
                $query->select('id', 'nama');
              },
            ]);
        }
      ])
      ->whereHas('motor')
      ->whereHas('kota')
      ->paginate(8);

    return response()->json($motorData);
  }

  public function getMotorByMerk(Request $request)
  {
    $idMerk = intval($request->input('id_merk'));
    $motorData = Motor::with([
      'detailMotor' => function ($query) {
        $query->select('id', 'id_motor', 'gambar', 'warna');
      },
      'type' => function ($query) {
        $query->select('id', 'nama');
      },
      'merk' => function ($query) {
        $query->select('id', 'nama');
      },
    ])
      ->where('id_merk', '=', $idMerk)
      ->whereHas('type')
      ->whereHas('merk')
      ->paginate(8);
    return response()->json($motorData);
  }

  public function getMotorByPriceRange(Request $request)
  {
    $minPrice = $request->input('min_price');
    $maxPrice = $request->input('max_price');

    $motor = Motor::whereBetween('harga', [$minPrice, $maxPrice])
      ->paginate(8);

    return response()->json($motor);
  }
}
