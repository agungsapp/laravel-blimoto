<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CicilanMotor;
use App\Models\Merk;
use App\Models\Motor;
use App\Models\MotorKota;
use Illuminate\Http\Request;

class UserMotorController extends Controller
{
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


  public function getAllMerk(Request $request)
  {
    $merkData = Merk::all();
    return response()->json($merkData);
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

  public function getMotorTenor(Request $request)
  {
    $idMotor = $request->input('id_motor');

    $tenor = CicilanMotor::select('tenor')
      ->distinct('tenor')
      ->where('id_motor', '=', $idMotor)
      ->get();

    return response()->json($tenor);
  }
}
