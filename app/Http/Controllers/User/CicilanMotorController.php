<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CicilanMotor;
use App\Models\DiskonMotor;
use App\Models\Kota;
use App\Models\LeasingMotor;
use App\Models\Motor;
use App\Models\MotorKota;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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


    if ($request->input('pembayaran') == 1) {
      $validator = Validator::make(
        $request->all(),
        [
          'id_lokasi' => 'required',
          'id_motor' => 'required',
          'dp' => 'required',
          'tenor' => 'required',
        ],
        [
          'id_lokasi.required' => 'kota harus dipilih terlebih dahulu',
          'id_motor.required' => 'motor harus dipilih terlebih dahulu',
          'dp.required' => 'dp harus dipilih terlebih dahulu',
          'tenor.required' => 'tenor harus dipilih terlebih dahulu',
        ]
      );

      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
      }
    } else {
      // dd($request->input('pembayaran'));
      $validator = Validator::make(
        $request->all(),
        [
          'id_lokasi' => 'required',
          'id_motor' => 'required',
          'dp' => 'required',
          'pembayaran' => 'required',
        ],
        [
          'id_lokasi.required' => 'kota harus dipilih terlebih dahulu',
          'id_motor.required' => 'motor harus dipilih terlebih dahulu',
          'dp.required' => 'dp harus dipilih terlebih dahulu',
          'pembayaran.required' => 'pembayaran harus dipilih terlebih dahulu',
        ]
      );

      if ($validator->fails()) {
        // dd($request);
        return redirect()->back()->withErrors($validator)->withInput();
      }
      $id_lokasi = $request->input('id_lokasi');
      $id_motor = $request->input('id_motor');
      $pembayaran = $request->input('pembayaran');

      return redirect()->to("/detail-motor?_token=URotrl3JPsfZnK6ER5OF6RHFxvGjINUduJcdytlY&id_lokasi=$id_lokasi&id_motor=$id_motor&pembayaran=$pembayaran");
    }



    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    }


    $id_lokasi = $request->input('id_lokasi');
    $id_motor = $request->input('id_motor');
    // $dp = $request->input('dp');
    $tenor = $request->input('tenor');


    // $kotaId = Session::get('lokasiUser');
    // // Set default value of $kotaId to 1 if it's empty
    // if (!empty($kotaId)) {
    //   $id_lokasi = $kotaId;
    // }

    $motorOtr = MotorKota::where('id_kota', $id_lokasi)->where('id_motor', $id_motor)->first(); // get otr motor


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
        'motorKota' => function ($query) {
          $query->select('harga_otr');
        },
      ])
      ->where('stock', 1)
      ->find($id_motor);

    if (!$motor) {
      // return response()->json([
      //   'message' => 'tidak ada data'
      // ], 404);

      return redirect()->back()->withErrors(['customError' => 'Motor tidak ditemukan'])->withInput();
    }

    $cicilan_motor = DB::table('cicilan_motor')
      ->join('leasing_motor', 'cicilan_motor.id_leasing', '=', 'leasing_motor.id')
      ->where('id_motor', $id_motor)
      ->where('id_lokasi', $id_lokasi)
      ->where('tenor', $tenor)
      ->groupBy('id_leasing')
      ->orderBy('id_leasing', 'ASC')
      ->get();

    if ($cicilan_motor->isEmpty()) {
      // return response()->json([
      //   'message' => 'tidak ada data cicilan motor'
      // ], 404);
      return redirect()->back()->withErrors(['customError' => 'tidak ada data cicilan motor'])->withInput();
    }

    $data = array(
      'motor' => array(
        'nama' => $motor->nama,
        'otr' => $motorOtr->harga_otr,
        // 'otr' => $motor->harga,
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
        $potonganTenor = $diskonMotor[0]->potongan_tenor;
      } else {
        $diskon = 0;
        $dpBayar = $cicilan->dp;
        $potonganTenor = 0;
      }
      // dd($cicilan);
      // $motorOtr = MotorKota::where('id_kota', $cicilan->id_lokasi)->where('id_motor', $cicilan->id_motor)->first();
      // dd($motorOtr);

      // lastup

      $data['cicilan_motor'][] = array(
        'nama_leasing' => $cicilan->nama,
        'dp' => $cicilan->dp,
        'diskon' => $diskon,
        'dp_bayar' => $dpBayar,
        // 'harga_otr' => $motorOtr->harga_otr,
        'gambar' => $cicilan->gambar,
        'angsuran' => $cicilan->cicilan,
        'tenor' => $cicilan->tenor,
        'potongan_tenor' => $potonganTenor,
        'total_tenor' => $cicilan->tenor - $potonganTenor,
        'total_bayar' => ($cicilan->tenor - $potonganTenor) * $cicilan->cicilan + $dpBayar,
      );
    }


    $averageAngsuran = array_sum($averageAngsuran) / count($averageAngsuran);
    // $dpRange = $dp * 0.2;
    $cicilanRange = $averageAngsuran * 0.2;


    $lowestAngsuran = min(array_column($data['cicilan_motor'], 'angsuran'));
    foreach ($data['cicilan_motor'] as $key => &$cicilan) {
      $cicilan['best'] = $cicilan['angsuran'] == $lowestAngsuran;
    }

    // apakah di sini ? 



    // $recommendationCicilan = CicilanMotor
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
      ->where('id_motor', '!=', $id_motor)
      // ->whereBetween('dp', [$dp - $dpRange, $dp + $dpRange])
      ->where('tenor', $tenor)
      ->where('id_lokasi', $id_lokasi)
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

      // dd($recommendation->motor->motorKota);

      $cicilanMotor = [
        'nama_leasing' => $recommendation->leasingMotor->nama,
        'dp' => $recommendation->dp,
        'diskon' => $diskon,
        'dp_bayar' => $dpBayar,
        'harga_otr' => $recommendation->motorData,
        // 'harga_otr' => $recommendation->motorData,
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
            'otr' => $motorOtr->harga_otr,
            // 'otr' => $recommendation->motor->harga,
            'merk' => $recommendation->motor->merk->nama,
            'type' => $recommendation->motor->type->nama,
            'detail_motor' => $recommendation->motor->detailMotor,
          ],
          'cicilan_motor' => [$cicilanMotor],
        ];

        $rekomendasiMotor[$motorId] = $item;
      }
    }





    // Menentukan variabel untuk melacak apakah nama leasing adalah "FIF Group"
    $isFIFGroup = false;

    // Mencari data dari leasing dengan nama "FIF Group"
    foreach ($rekomendasiMotor as &$rekomendasi) {
      foreach ($rekomendasi['cicilan_motor'] as &$cicilan) {
        if ($cicilan['nama_leasing'] === "FIF Group") {
          $isFIFGroup = true;
          break 2; // Keluar dari loop jika ditemukan nama leasing "FIF Group"
        }
      }
    }
    unset($rekomendasi); // memutus referensi terakhir
    unset($cicilan); // memutus referensi terakhir

    // Melakukan pengurutan berdasarkan kriteria tertentu
    foreach ($rekomendasiMotor as &$rekomendasi) {
      // Tentukan cicilan dengan angsuran terendah untuk setiap motor rekomendasi
      $lowestAngsuranRekomendasi = min(array_column($rekomendasi['cicilan_motor'], 'angsuran'));
      $bestSet = false; // Variabel untuk melacak apakah nilai best sudah diatur sebelumnya

      foreach ($rekomendasi['cicilan_motor'] as &$cicilan) {
        // Tentukan nilai best berdasarkan apakah angsuran pada baris ini sama dengan angka terendah
        if (!$bestSet && $cicilan['angsuran'] == $lowestAngsuranRekomendasi) {
          $cicilan['best'] = true;
          $bestSet = true; // Set variabel bestSet menjadi true untuk menandakan nilai best sudah diatur
        } else {
          $cicilan['best'] = false;
        }
      }

      // Jika nama leasing "FIF Group" ditemukan, maka prioritas akan diberikan kepada leasing "FIF Group"
      usort($rekomendasi['cicilan_motor'], function ($a, $b) use ($isFIFGroup) {
        // Jika nama leasing "FIF Group" ditemukan, maka berikan prioritas kepada leasing "FIF Group"
        if ($isFIFGroup) {
          return $a['nama_leasing'] === "FIF Group" ? -1 : 1;
        }
        // Jika tidak ditemukan, urutkan berdasarkan total bayar
        return $a['total_bayar'] - $b['total_bayar'];
      });
    }
    unset($rekomendasi); // memutus referensi terakhir
    unset($cicilan); // memutus referensi terakhir





    // Convert the associative array to a sequential array
    $rekomendasiMotor = array_values($rekomendasiMotor);
    $data = [
      'lokasi' => $lokasi->nama,
      'data' => $data,
      'rekomendasi' => $rekomendasiMotor,
    ];

    // $data
    // dd($data['data']);
    // return response()->json($data);
    return view('user.cari_diskon.index', $data);
  }
  // sss

  public function handleForm(Request $request)
  {
    $merk = $request->get('merk');
    $type = $request->get('type');

    $data = [$merk, $type];
    return dd($data);
  }
}
