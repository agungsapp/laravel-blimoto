<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CicilanMotor;
use App\Models\DetailMotor;
use App\Models\DiskonMotor;
use App\Models\Kota;
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

  // public function getDetailMotor(Request $request)
  // {
  //   $motorId = $request->input('id_motor');
  //   $lokasiId = $request->input('id_lokasi');

  //   $motor = Motor::select('id', 'id_merk', 'id_type', 'nama', 'harga', 'deskripsi', 'fitur_utama', 'bonus')
  //     ->with([
  //       'merk' => function ($query) {
  //         $query->select('id', 'nama');
  //       },
  //       'type' => function ($query) {
  //         $query->select('id', 'nama');
  //       },
  //     ])
  //     ->where('stock', 1)
  //     ->find($motorId);

  //   $detailMotor  = DetailMotor::select(
  //     'detail_motor.id',
  //     'detail_motor.gambar',
  //     'detail_motor.warna',
  //   )
  //     ->where('detail_motor.id_motor', $motorId)
  //     ->get();

  //   $diskonMotor = DiskonMotor::where('id_motor', $motorId)
  //     ->whereIn(DB::raw('(id_leasing, tenor)'), function ($query) {
  //       $query->select(DB::raw('id_leasing, MAX(tenor)'))
  //         ->from('diskon_motor')
  //         ->whereColumn('diskon_motor.id_leasing', '=', 'id_leasing')
  //         ->groupBy('id_leasing');
  //     })
  //     ->get();

  //   $diskonLeasing = DB::table('cicilan_motor')
  //     ->select(
  //       DB::raw('MIN(cicilan_motor.dp) as dp'),
  //       DB::raw('MIN(cicilan_motor.tenor) as tenor'),
  //       'leasing_motor.gambar',
  //       'leasing_motor.nama',
  //       'leasing_motor.diskon_normal',
  //       'leasing_motor.diskon',
  //       'leasing_motor.id',
  //     )
  //     ->join('motor', 'cicilan_motor.id_motor', '=', 'motor.id')
  //     ->join('leasing_motor', 'cicilan_motor.id_leasing', '=', 'leasing_motor.id')
  //     ->where('cicilan_motor.id_motor', $motorId)
  //     ->where('id_lokasi', $lokasiId)
  //     ->groupBy('leasing_motor.id', 'leasing_motor.nama', 'leasing_motor.diskon_normal', 'leasing_motor.diskon', 'leasing_motor.gambar')
  //     ->get();

  //   foreach ($diskonLeasing as $key => $c) {
  //     $foundDiscount = $diskonMotor->first(function ($item) use ($c) {
  //       return $item->id_leasing === $c->id;
  //     });

  //     if ($foundDiscount) {
  //       $c->diskon_normal = $c->dp - $foundDiscount->diskon;
  //       $c->diskon = $c->dp - $foundDiscount->diskon_promo;
  //     } else {
  //       $c->diskon_normal = 0;
  //       $c->diskon = 0;
  //     }
  //   }


  //   $motorRekomendasi = Motor::select('id', 'id_merk', 'id_type', 'nama', 'harga', 'deskripsi', 'fitur_utama')
  //     ->with([
  //       'merk' => function ($query) {
  //         $query->select('id', 'nama');
  //       },
  //       'type' => function ($query) {
  //         $query->select('id', 'nama');
  //       },
  //       'detailMotor' => function ($query) {
  //         $query->select('id', 'gambar', 'id_motor');
  //       },
  //       'cicilanMotor' => function ($query) {
  //         $query->select('id_motor', DB::raw('MIN(dp) as min_dp'), DB::raw('MAX(dp) as max_dp'))
  //           ->groupBy('id_motor');
  //       },
  //     ])
  //     ->where('stock', 1)
  //     ->has('cicilanMotor')
  //     ->inRandomOrder()
  //     ->take(5)
  //     ->get();

  //   $data = [
  //     'motor' => [
  //       'nama' => $motor->nama,
  //       'harga' => $motor->harga,
  //       'merk' => $motor->merk->nama,
  //       'type' => $motor->type->nama,
  //       'deskripsi' => $motor->deskripsi,
  //       'fitur' => $motor->fitur_utama,
  //       'bonus' => $motor->bonus,
  //       'detail_motor' => $detailMotor,
  //     ],
  //     'diskon_leasing' => $diskonLeasing,
  //     'id_motor' => $motorId,
  //     'rekomendasi' => $motorRekomendasi

  //   ];

  //   // dd($data);
  //   return view('user.detail.detail_motor', $data);
  // }

  public function getDetailMotor(Request $request)
  {
    $motorId = $request->input('id_motor');
    // $lokasiId = 1;
    $lokasiId = $request->input('id_lokasi');
    $pembayaran = $request->input('pembayaran');

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
      ->find($motorId);

    $minTenor = CicilanMotor::where('id_motor', $motorId)
      ->where('id_lokasi', $lokasiId)
      ->selectRaw('MAX(tenor) as tenor')
      ->pluck('tenor')
      ->first();

    // $subQuery = DB::table('cicilan_motor')
    //   ->where('id_motor', $motorId)
    //   ->where('id_lokasi', $lokasiId)
    //   ->selectRaw('MIN(dp) as dp')
    //   ->groupBy('id_leasing')
    //   ->pluck('dp');

    $cicilan_motor = DB::table('cicilan_motor')
      ->join('leasing_motor', 'cicilan_motor.id_leasing', '=', 'leasing_motor.id')
      ->where('id_motor', $motorId)
      ->where('id_lokasi', $lokasiId)
      ->where('tenor', $minTenor)
      ->groupBy('id_leasing')
      ->orderBy('id_leasing', 'ASC')
      ->get();

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

    $diskonMotor = DiskonMotor::where('id_motor', $motorId)
      ->where('tenor', $minTenor)
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
        $potonganTenor = $diskonMotor[0]->potongan_tenor;
      } else {
        $diskon = 0;
        $dpBayar = $cicilan->dp;
        $potonganTenor = 0;
      }

      $data['cicilan_motor'][] = array(
        'nama_leasing' => $cicilan->nama,
        'dp' => $cicilan->dp,
        'diskon' => $diskon,
        'dp_bayar' => $dpBayar,
        'gambar' => $cicilan->gambar,
        'angsuran' => $cicilan->cicilan,
        'tenor' => $cicilan->tenor,
        'potongan_tenor' => $potonganTenor,
        'total_tenor' => $cicilan->tenor - $potonganTenor,
        'total_bayar' => ($cicilan->tenor - $potonganTenor) * $cicilan->cicilan + $dpBayar,
      );
    }

    // logic highlight leasing untuk data motor pertama di detail start
    $isAllSame = true;
    $prevDpBayar = null;
    $prevTotalBayar = null;
    $fifKey = null;

    // Cek apakah semua data sama dan cari FIF Group
    foreach ($data['cicilan_motor'] as $key => &$value) {
      if ($prevDpBayar !== null && ($value['dp_bayar'] != $prevDpBayar || $value['total_bayar'] != $prevTotalBayar)) {
        $isAllSame = false;
      }

      if ($value['nama_leasing'] == "FIF Group") {
        $fifKey = $key;
      }

      $prevDpBayar = $value['dp_bayar'];
      $prevTotalBayar = $value['total_bayar'];
      $value['best'] = false; // Default ke false
    }
    unset($value); // Memutus referensi pada elemen terakhir

    // Jika semua data sama, tandai FIF Group sebagai terbaik
    if ($isAllSame && $fifKey !== null) {
      $data['cicilan_motor'][$fifKey]['best'] = true;
    } else {
      // Cari cicilan dengan angsuran terendah
      $lowestAngsuran = PHP_INT_MAX;
      $bestDiscountKey = null;
      foreach ($data['cicilan_motor'] as $key => $value) {
        if ($value['angsuran'] < $lowestAngsuran) {
          $lowestAngsuran = $value['angsuran'];
          $bestDiscountKey = $key;
        }
      }

      // Tandai cicilan terbaik
      if ($bestDiscountKey !== null) {
        $data['cicilan_motor'][$bestDiscountKey]['best'] = true;
      }
    }

    // logic highlight leasing untuk data motor pertama di detail end

    // dd($data);

    // return response()->json($data);
    // area rekomendasi
    $averageAngsuran = array_sum($averageAngsuran) / count($averageAngsuran);
    $cicilanRange = $averageAngsuran * 0.2;

    $recommendationCicilan = CicilanMotor::select('id', 'dp', 'tenor', 'cicilan', 'id_leasing', 'id_motor')
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
      ->where('id_motor', '!=', $motorId)
      // ->whereBetween('dp', [$dp - $dpRange, $dp + $dpRange])
      ->where('tenor', $minTenor)
      ->where('id_lokasi', $lokasiId)
      ->whereBetween('cicilan', [$cicilan_motor[0]->cicilan - $cicilanRange, $cicilan_motor[0]->cicilan + $cicilanRange])
      ->orderBy('cicilan', 'asc')
      ->limit(3)
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
      $potonganTenor = $foundDiscount ? $diskonMotor[0]->potongan_tenor : 0;
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
        'potongan_tenor' => $potonganTenor,
        'total_tenor' => $recommendation->tenor - $potonganTenor,
        'total_bayar' => ($recommendation->tenor - $potonganTenor) * $recommendation->cicilan + $dpBayar,
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


    // proses penentuan rekomendasi highlight leasing terbaik start
    foreach ($rekomendasiMotor as $motorId => &$motorInfo) {
      $isAllSame = true;
      $prevDpBayar = null;
      $prevTotalBayar = null;
      $prevAngsuran = null;
      $fifKey = null;

      // Cek apakah semua data sama
      foreach ($motorInfo['cicilan_motor'] as $key => &$cicilan) {
        if ($prevDpBayar !== null && ($cicilan['dp_bayar'] != $prevDpBayar || $cicilan['total_bayar'] != $prevTotalBayar || $cicilan['angsuran'] != $prevAngsuran)) {
          $isAllSame = false;
        }

        if ($cicilan['nama_leasing'] == "FIF Group") {
          $fifKey = $key;
        }

        $prevDpBayar = $cicilan['dp_bayar'];
        $prevTotalBayar = $cicilan['total_bayar'];
        $prevAngsuran = $cicilan['angsuran'];
        $cicilan['best'] = false; // Default ke false
      }

      // Jika semua data sama, tandai FIF Group sebagai terbaik
      if ($isAllSame && $fifKey !== null) {
        $motorInfo['cicilan_motor'][$fifKey]['best'] = true;
        continue;
      }

      // Cari cicilan dengan angsuran terendah
      $lowestAngsuran = PHP_INT_MAX;
      $bestDiscountKey = null;
      foreach ($motorInfo['cicilan_motor'] as $key => $cicilan) {
        if ($cicilan['angsuran'] < $lowestAngsuran) {
          $lowestAngsuran = $cicilan['angsuran'];
          $bestDiscountKey = $key;
        }
      }

      // Tandai cicilan terbaik
      if ($bestDiscountKey !== null) {
        $motorInfo['cicilan_motor'][$bestDiscountKey]['best'] = true;
      }
    }
    unset($motorInfo); // Memutus referensi pada elemen terakhir 
    // proses penentuan rekomendasi highlight leasing terbaik end 

    $rekomendasiMotor = array_values($rekomendasiMotor);
    $lokasi = Kota::find($lokasiId);

    $data = [
      'lokasi' => $lokasi->nama,
      'data' => $data,
      'rekomendasi' => $rekomendasiMotor,
      'pembayaran' => $pembayaran
    ];

    // dd($data['rekomendasi']);
    // dd($data);



    // return response()->json($data);
    return view('user.detail.detail_motor', $data);
  }


  public function getDetailLeasing(Request $request)
  {
    $idMotor = $request->input('id_motor');
    $idLeasing = $request->input('id_leasing');
    $tenor = $request->input('tenor');

    $maxTenorQuery = CicilanMotor::select(DB::raw('MAX(cicilan_motor.tenor) as tenor'))
      ->where('id_motor', $idMotor)
      ->where('id_leasing', $idLeasing);

    if ($tenor) {
      $maxTenorQuery->where('tenor', $tenor);
    }

    $maxTenor = $maxTenorQuery->first()->tenor;

    $data = CicilanMotor::where('id_motor', $idMotor)
      ->join('leasing_motor', 'cicilan_motor.id_leasing', '=', 'leasing_motor.id')
      ->where('id_leasing', $idLeasing)
      ->where('tenor', $maxTenor)
      ->get();

    foreach ($data as $key => $c) {
      $c->diskon_normal = $c->dp - round($c->dp * $c->diskon_normal);
      $c->diskon = $c->dp - round($c->dp * $c->diskon);
    }

    // data tenor motor
    $dataTenor = CicilanMotor::select('tenor')
      ->distinct('tenor')
      ->where('id_motor', '=', $idMotor)
      ->where('id_leasing', '=', $idLeasing)
      ->get();


    $motor = Motor::find($idMotor);

    return view(
      'user.detail.detail_leasing',
      [
        'data' => $data,
        'motor' => $motor,
        'tenor' => $dataTenor
      ]
    );
  }

  public function getDetailLeasingNoReload(Request $request)
  {
    $idMotor = $request->input('id_motor');
    $idLeasing = $request->input('id_leasing');
    $idLokasi = $request->input('id_lokasi');
    $tenor = $request->input('tenor');
    $dp = $request->input('dp');

    $maxTenorQuery = CicilanMotor::select(DB::raw('MAX(cicilan_motor.tenor) as tenor'))
      ->where('id_motor', $idMotor)
      ->where('id_leasing', $idLeasing);

    if ($tenor) {
      $maxTenorQuery->where('tenor', $tenor);
    }

    $maxTenor = $maxTenorQuery->first()->tenor;

    $query = DB::table('cicilan_motor')
      ->join('leasing_motor', 'cicilan_motor.id_leasing', '=', 'leasing_motor.id')
      ->where('cicilan_motor.id_motor', '=', $idMotor)
      ->where('cicilan_motor.id_lokasi', '=', $idLokasi)
      ->where('cicilan_motor.id_leasing', '=', $idLeasing)
      ->where('cicilan_motor.tenor', '=', $maxTenor);

    if ($dp !== null) {
      $query->where('cicilan_motor.dp', '=', $dp);
    }

    $result = $query->get();


    foreach ($result as $key => $c) {
      $c->diskon_normal = $c->dp - round($c->dp * $c->diskon_normal);
      $c->diskon = $c->dp - round($c->dp * $c->diskon);
    }

    // dd($result);
    // data tenor motor
    $dataTenor = CicilanMotor::select('tenor')
      ->distinct('tenor')
      ->where('id_motor', '=', $idMotor)
      ->where('id_leasing', '=', $idLeasing)
      ->get();

    $dataDP = CicilanMotor::select('dp')
      ->distinct('dp')
      ->where('id_motor', '=', $idMotor)
      ->where('id_leasing', '=', $idLeasing)
      ->get();



    $motor = Motor::find($idMotor);

    return view(
      'user.detail.detail_leasing_no_reload',
      [
        'data' => $result,
        'motor' => $motor,
        'tenor' => $dataTenor,
        'dp' => $dataDP
      ]
    );
  }
}
