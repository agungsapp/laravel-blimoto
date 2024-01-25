<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Merk;
use App\Models\Motor;
use App\Models\MotorKota;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class MotorTerbaruController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $request->flash();
    // Mengatur query untuk selalu memilih motor dengan id_best_motor = 7
    $query = Motor::with('merk', 'type', 'detailMotor')
      ->whereHas('mtrBestMotor', function ($q) {
        $q->where('id_best_motor', 7);
      });

    // Filter berdasarkan lokasi dari session jika ada
    if (Session::get('lokasiUser')) {
      $kota = Session::get('lokasiUser');
      $query->whereHas('motorKota', function ($q) use ($kota) {
        $q->where('id_kota', $kota);
      });
    }

    // Apply brand filter if specified
    if ($request->filled('id_merk')) {
      $brandIds = $request->input('id_merk');
      $query->whereHas('merk', function ($query) use ($brandIds) {
        $query->whereIn('id', $brandIds);
      });
    }

    // Apply type filter if specified
    if ($request->filled('id_type')) {
      $typeIds = $request->input('id_type');
      $query->whereHas('type', function ($query) use ($typeIds) {
        $query->whereIn('id', $typeIds);
      });
    }

    // Apply price range filter if specified
    if ($request->filled('min_price') && $request->filled('max_price')) {
      $query->whereBetween('harga', [$request->input('min_price'), $request->input('max_price')]);
    }

    // Apply sorting based on the parameter
    if ($request->filled('sort')) {
      switch ($request->input('sort')) {
        case 'newest':
          $query->orderBy('updated_at', 'desc');
          break;
        case 'highest_price':
          $query->orderBy('harga', 'desc');
          break;
        case 'lowest_price':
          $query->orderBy('harga', 'asc');
          break;
      }
    } else {
      // Default sorting by newest if no sort parameter is provided
      $query->orderBy('updated_at', 'desc');
    }

    // Execute the query and get paginated results
    $motorData = $query->paginate(8);

    // Append current request's query parameters to the pagination links
    $motorData->appends($request->all());

    return view('user.motor_terbaru.index', [
      'data' => $motorData,
      'merks' => Merk::all(),
      'types' => Type::all(),
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

  public function filterMotor(Request $request)
  {
    $request->flash();
    // Start the query builder
    $query = Motor::with('merk', 'type', 'detailMotor');
    // dd($request->all());

    // Apply brand filter if specified
    if ($request->filled('id_merk')) {
      $brandIds = $request->input('id_merk'); // Expecting an array of IDs
      $query->whereHas('merk', function ($query) use ($brandIds) {
        $query->whereIn('id', $brandIds);
      });
    }

    // Apply type filter if specified
    if ($request->filled('id_type')) {
      $typeIds = $request->input('id_type'); // Expecting an array of IDs
      $query->whereHas('type', function ($query) use ($typeIds) {
        $query->whereIn('id', $typeIds);
      });
    }

    // Apply price range filter if specified
    if ($request->filled('min_price') && $request->filled('max_price')) {
      $query->whereBetween('harga', [$request->input('min_price'), $request->input('max_price')]);
    }

    // Apply sorting based on the parameter
    if ($request->filled('sort')) {
      switch ($request->input('sort')) {
        case 'newest':
          $query->orderBy('updated_at', 'desc');
          break;
        case 'highest_price':
          $query->orderBy('harga', 'desc');
          break;
        case 'lowest_price':
          $query->orderBy('harga', 'asc');
          break;
      }
    } else {
      // Default sorting by newest if no sort parameter is provided
      $query->orderBy('updated_at', 'desc');
    }

    // Execute the query and get paginated results
    $motorData = $query->paginate(8);

    // Append current request's query parameters to the pagination links
    $motorData->appends($request->all());

    // Return the view with data and additional filter data for form selections
    return view('user.motor_terbaru.index', [
      'data' => $motorData,
      'merks' => Merk::all(),
      'types' => Type::all(),
    ]);
  }

  public function getlengkap(Request $request)
  {
    $request->flash();
    $kotaId = Session::get('lokasiUser', 1);

    // Inisialisasi query utama
    $query = Motor::with('merk', 'type', 'detailMotor')
      ->whereHas('mtrBestMotor', function ($q) {
        $q->where('id_best_motor', 7); // Menggunakan ID 7 secara tetap
      })
      ->leftJoin('cicilan_motor', 'motor.id', '=', 'cicilan_motor.id_motor')
      ->leftJoin('detail_motor', 'motor.id', '=', 'detail_motor.id_motor')
      ->leftJoin('diskon_motor', 'motor.id', '=', 'diskon_motor.id_motor')
      ->select(
        'motor.*',
        'cicilan_motor.dp',
        'cicilan_motor.cicilan',
        'cicilan_motor.tenor',
        'cicilan_motor.id_leasing',
        'cicilan_motor.id_lokasi',
        'detail_motor.gambar',
        'diskon_motor.diskon',
        'diskon_motor.diskon_promo',
        'diskon_motor.potongan_tenor'
      );

    // Filter berdasarkan lokasi dari session jika ada
    if (Session::get('lokasiUser')) {
      $query->whereHas('motorKota', function ($q) use ($kotaId) {
        $q->where('id_kota', $kotaId);
      });
    }

    // Apply brand filter if specified
    if ($request->filled('id_merk')) {
      $brandIds = $request->input('id_merk');
      $query->whereHas('merk', function ($query) use ($brandIds) {
        $query->whereIn('id', $brandIds);
      });
    }

    // Apply type filter if specified
    if ($request->filled('id_type')) {
      $typeIds = $request->input('id_type');
      $query->whereHas('type', function ($query) use ($typeIds) {
        $query->whereIn('id', $typeIds);
      });
    }

    // Apply price range filter if specified
    if ($request->filled('min_price') && $request->filled('max_price')) {
      $query->whereBetween('harga', [$request->input('min_price'), $request->input('max_price')]);
    }

    // Apply sorting based on the parameter
    if ($request->filled('sort')) {
      switch ($request->input('sort')) {
        case 'newest':
          $query->orderBy('updated_at', 'desc');
          break;
        case 'highest_price':
          $query->orderBy('harga', 'desc');
          break;
        case 'lowest_price':
          $query->orderBy('harga', 'asc');
          break;
      }
    } else {
      // Default sorting by newest if no sort parameter is provided
      $query->orderBy('updated_at', 'desc');
    }

    // Execute the query and get paginated results
    $motorData = $query->paginate(8);

    // Mengembalikan data ke view dengan informasi tambahan
    return view('user.motor_terbaru.index', [
      'data' => $motorData,
      'merks' => Merk::all(),
      'types' => Type::all(),
    ]);
  }
}
