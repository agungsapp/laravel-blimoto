<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CicilanMotor;
use App\Models\DiskonMotor;
use App\Models\Kota;
use App\Models\LeasingMotor;
use App\Models\Motor;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

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
    // $dp = $request->input('dp');
    $tenor = $request->input('tenor');

    $lokasi = Kota::find($id_lokasi);
    $motor = Motor::select('id', 'id_merk', 'id_type', 'nama', 'harga')
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
      ->find($id_motor);

    if (!$motor) {
      return response()->json([
        'message' => 'tidak ada data'
      ], 404);
    }

    // $cicilan_motor = CicilanMotor::select('id', 'dp', 'tenor', 'cicilan', 'potongan_tenor', 'id_leasing', 'id_motor', 'id_lokasi')
    //   ->with([
    //     'leasingMotor' => function ($query) {
    //       $query->select('id', 'nama', 'gambar');
    //     },
    //   ])
    //   ->where('id_lokasi', $id_lokasi)
    //   ->where('id_motor', $id_motor)
    //   ->where('tenor', $tenor)
    //   ->where('dp', $dp)
    //   ->get();

    // dd($cicilan_motor);


    // $cicilan_motor = CicilanMotor::with(['leasingMotor'])
    //   ->where('id_lokasi', $id_lokasi)
    //   ->where('id_motor', $id_motor)
    //   ->where('tenor', $tenor)
    //   ->where(function ($query) {
    //     $query->where('dp', DB::raw("(SELECT MIN(dp))"));
    //   })
    //   ->distinct()
    //   ->get();


    $subQuery = DB::table('cicilan_motor')
      ->where('id_motor', $id_motor)
      ->where('tenor', $tenor)
      ->where('id_lokasi', $id_lokasi)
      ->selectRaw('MIN(dp) as dp')
      ->groupBy('id_leasing')
      ->pluck('dp');

    $cicilan_motor = CicilanMotor::with('leasingMotor')
      ->where('id_motor', $id_motor)
      ->where('tenor', $tenor)
      ->where('id_lokasi', $id_lokasi)
      ->whereIn('dp', $subQuery)
      ->get();

    if ($cicilan_motor->isEmpty()) {
      return response()->json([
        'message' => 'tidak ada data cicilan motor'
      ], 404);
    }

    $data = array(
      'motor' => array(
        'nama' => $motor->nama,
        'otr' => $motor->harga,
        'merk' => $motor->merk->nama,
        'type' => $motor->type->nama,
        'detail_motor' => $motor->detailMotor,
      ),
      'cicilan_motor' => array(),
    );

    $diskonMotor = DiskonMotor::where('id_motor', $id_motor)
      ->where('tenor', $tenor)
      ->get();


    $averageAngsuran = array();
    foreach ($cicilan_motor as $cicilan) {
      $dpBayar = $cicilan->dp;
      $averageAngsuran[] = $cicilan->cicilan;
      $foundDiscount = $diskonMotor->first(function ($item) use ($cicilan) {
        return $item->id_leasing === $cicilan->id_leasing;
      });

      if ($foundDiscount) {
        $diskon = $foundDiscount->diskon_promo;
        $dpBayar = $cicilan->dp - $diskon;
      } else {
        $diskon = 0;
        $dpBayar = $cicilan->dp;
      }

      $data['cicilan_motor'][] = array(
        'nama_leasing' => $cicilan->leasingMotor->nama,
        'dp' => $cicilan->dp,
        'diskon' => $diskon,
        'dp_bayar' => $dpBayar,
        'gambar' => $cicilan->leasingMotor->gambar,
        'angsuran' => $cicilan->cicilan,
        'tenor' => $cicilan->tenor,
        'potongan_tenor' => $cicilan->potongan_tenor,
        'total_tenor' => $cicilan->tenor - $cicilan->potongan_tenor,
        'total_bayar' => ($cicilan->tenor - $cicilan->potongan_tenor) * $cicilan->cicilan + $dpBayar,
      );
    }

    $averageAngsuran = array_sum($averageAngsuran) / count($averageAngsuran);
    // dd($data);
    // $dpRange = $dp * 0.2;
    $cicilanRange = $averageAngsuran * 0.2;

    // $recommendationCicilan = CicilanMotor
    $recommendationCicilan = CicilanMotor::select('id', 'dp', 'tenor', 'cicilan', 'potongan_tenor', 'id_leasing', 'id_motor')
      ->with([
        'motor' => function ($query) {
          $query->select('id', 'id_merk', 'id_type', 'nama', 'harga')
            ->where('stock', 1);
          $query->with([
            'detailmotor' => function ($query) {
              $query->select('id', 'id_motor', 'warna', 'gambar');
            },
            'merk' => function ($query) {
              $query->select('id', 'nama');
            },
            'type' => function ($query) {
              $query->select('id', 'nama');
            }
          ]);
        },
        'leasingmotor' => function ($query) {
          $query->select('id', 'nama', 'gambar');
        },
      ])
      ->where('id_motor', '!=', $id_motor)
      // ->whereBetween('dp', [$dp - $dpRange, $dp + $dpRange])
      ->where('tenor', $tenor)
      ->where('id_lokasi', $id_lokasi)
      ->whereBetween('cicilan', [$cicilan_motor[0]->cicilan - $cicilanRange, $cicilan_motor[0]->cicilan + $cicilanRange])
      ->orderBy('cicilan', 'asc')
      ->get();

    $rekomendasiMotor = [];
    // dd($recommendationCicilan);
    foreach ($recommendationCicilan as $recommendation) {
      if (!$recommendation->motor) {
        continue; // Skip if recommendation doesn't have motor
      }

      $dpBayar = $recommendation->dp;
      $foundDiscount = $diskonMotor->first(function ($item) use ($recommendation) {
        return $item->id_leasing === $recommendation->leasingMotor->id;
      });

      $diskon = $foundDiscount ? $foundDiscount->diskon_promo : 0;
      $dpBayar = $recommendation->dp - $diskon;

      $motorId = $recommendation->motor->id;

      $cicilanMotor = [
        'nama_leasing' => $recommendation->leasingMotor->nama,
        'dp' => $recommendation->dp,
        'diskon' => $diskon,
        'dp_bayar' => $dpBayar,
        'gambar' => $recommendation->leasingMotor->gambar,
        'angsuran' => $recommendation->cicilan,
        'tenor' => $recommendation->tenor,
        'potongan_tenor' => $recommendation->potongan_tenor,
        'total_tenor' => $recommendation->tenor - $recommendation->potongan_tenor,
        'total_bayar' => ($recommendation->tenor - $recommendation->potongan_tenor) * $recommendation->cicilan + $dpBayar,
      ];

      if (isset($rekomendasiMotor[$motorId])) {
        $existingLeasing = array_column($rekomendasiMotor[$motorId]['cicilan_motor'], 'nama_leasing');

        if (!in_array($recommendation->leasingMotor->nama, $existingLeasing)) {
          $rekomendasiMotor[$motorId]['cicilan_motor'][] = $cicilanMotor;
        }
      } else {
        $item = [
          'motor' => [
            'nama' => $recommendation->motor->nama,
            'otr' => $recommendation->motor->harga,
            'merk' => $recommendation->motor->merk->nama,
            'type' => $recommendation->motor->type->nama,
            'detail_motor' => $recommendation->motor->detailMotor,
          ],
          'cicilan_motor' => [$cicilanMotor],
        ];

        $rekomendasiMotor[$motorId] = $item;
      }
    }

    // Convert the associative array to a sequential array
    $rekomendasiMotor = array_values($rekomendasiMotor);
    $data = [
      'lokasi' => $lokasi->nama,
      'data' => $data,
      'rekomendasi' => $rekomendasiMotor,
    ];

    // return response()->json($data);
    return view('user.cari_diskon.index', $data);
  }


  public function handleForm(Request $request)
  {
    $merk = $request->get('merk');
    $type = $request->get('type');

    $data = [$merk, $type];
    return dd($data);
  }
}
