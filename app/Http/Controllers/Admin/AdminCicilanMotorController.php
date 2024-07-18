<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrosurMotor;
use App\Models\CicilanMotor;
use App\Models\Kota;
use App\Models\LeasingMotor;
use App\Models\Motor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

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
      'lokasi' => Kota::all(),
      'motor' => Motor::all(),
      'leasing' => LeasingMotor::all(),
      'tenor' => CicilanMotor::select('tenor')
        ->distinct('tenor')
        ->get()
    ];

    // dd($data);

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
    $data = [
      'motors' => Motor::all(),
      'leasings' => LeasingMotor::all(),
      'kotas' => Kota::all()
    ];

    return view('admin.cicilan.tambah', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'motor' => 'required',
      'leasing' => 'required',
      'kota' => 'required',
      'dp' => 'required|numeric',
      'tenor' => 'required|numeric',
      'cicilan' => 'required|numeric',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      CicilanMotor::create([
        'dp' => $request->input('dp'),
        'tenor' => $request->input('tenor'),
        'cicilan' => $request->input('cicilan'),
        'id_leasing' => $request->input('leasing'),
        'id_lokasi' => $request->input('kota'),
        'id_motor' => $request->input('motor'),
      ]);
      flash()->addSuccess("Data cicilan motor berhasil dibuat");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Gagal membuat data, pastikan sudah benar!");
      return redirect()->back();
    }
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
    $data = [
      'motors' => Motor::all(),
      'leasings' => LeasingMotor::all(),
      'kotas' => Kota::all(),
      'cicilan' => CicilanMotor::where('id', $id)->first(),
    ];

    return view('admin.cicilan.update', $data);
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
    $validator = Validator::make($request->all(), [
      'motor' => 'required',
      'leasing' => 'required',
      'kota' => 'required',
      'dp' => 'required|numeric',
      'tenor' => 'required|numeric',
      'cicilan' => 'required|numeric',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      $cicilan = CicilanMotor::find($id);

      if (!$cicilan) {
        flash()->addError("Data cicilan motor tidak ditemukan!");
        return redirect()->back();
      }

      $cicilan->update([
        'dp' => $request->input('dp'),
        'tenor' => $request->input('tenor'),
        'cicilan' => $request->input('cicilan'),
        'id_leasing' => $request->input('leasing'),
        'id_lokasi' => $request->input('kota'),
        'id_motor' => $request->input('motor'),
      ]);

      flash()->addSuccess("Data cicilan motor berhasil diupdate");
      return redirect()->route('admin.cicilan.index');
    } catch (\Throwable $th) {
      flash()->addError("Gagal mengupdate data, pastikan sudah benar!");
      return redirect()->back();
    }
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      $cicilan = CicilanMotor::find($id);

      if (!$cicilan) {
        flash()->addError("Data cicilan motor tidak ditemukan!");
        return redirect()->back();
      }

      $cicilan->delete();

      flash()->addSuccess("Data cicilan motor berhasil dihapus");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Gagal menghapus data, pastikan sudah benar!");
      return redirect()->back();
    }
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

    try {
      $distinctData = [];
      $originalData = [];

      if (($handle = fopen($request->file('file')->getRealPath(), 'r')) !== false) {
        fgetcsv($handle); // Skip header row
        while (($data = fgetcsv($handle, 0, ',')) !== false) {
          // Create a unique key based on indices 3, 4, and 5
          $key = $data[3] . '-' . $data[4] . '-' . $data[5];
          if (!array_key_exists($key, $distinctData)) {
            // Store distinct values and the original data for later use
            $distinctData[$key] = [
              'id_leasing' => $data[3],
              'id_lokasi' => $data[4],
              'id_motor' => $data[5]
            ];
          }
          $originalData[] = $data;
        }
        fclose($handle);
      }

      $foundDuplicate = false;

      // Check for duplicates in the database
      foreach ($distinctData as $disdat) {
        $cekCicilan = CicilanMotor::where('id_leasing', $disdat['id_leasing'])
          ->where('id_lokasi', $disdat['id_lokasi'])
          ->where('id_motor', $disdat['id_motor'])
          ->exists();

        if ($cekCicilan) {
          $foundDuplicate = true;
          break;
        }
      }

      if ($foundDuplicate) {
        Log::info("data ditemukan dan masuk ke blok hapus data !");
        // Hapus data duplikat dari database sebelum melakukan insert
        foreach ($distinctData as $disdat) {
          CicilanMotor::where('id_leasing', $disdat['id_leasing'])
            ->where('id_lokasi', $disdat['id_lokasi'])
            ->where('id_motor', $disdat['id_motor'])
            ->delete();
          Log::info(["pesan" => "data ini sudah di hapus  !", "data" => $disdat]);
        }
      }

      // Insert all data from the CSV after purification
      foreach ($originalData as $data) {
        CicilanMotor::create([
          'dp' => $data[0],
          'tenor' => $data[1],
          'cicilan' => $data[2],
          'id_leasing' => $data[3],
          'id_lokasi' => $data[4],
          'id_motor' => $data[5],
          // Jika ada kolom lain yang perlu anda masukkan, tambahkan juga di sini
        ]);
      }
      Log::info('data sukses di import !');
      flash()->addSuccess("Data cicilan motor berhasil di import !");
    } catch (\Throwable $th) {
      flash()->addError("Terjadi kesalahan saat menyimpan data ! error : " . $th->getMessage());
    } finally {
      return redirect()->back();
    }
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
          'cicilan' => $data[2],
          'id_leasing' => $data[3],
          'id_lokasi' => $data[4],
          'id_motor' => $data[5],
        ]);
      }

      fclose($handle);
    }

    flash()->addSuccess("Data csv berhasil diupdate");
    return redirect()->back();
  }

  // public function updatePotonganTenor(Request $request)
  // {
  //   $validator = Validator::make($request->all(), [
  //     'motor' => 'required',
  //     'tenor' => 'required',
  //     'leasing' => 'required',
  //     'lokasi' => 'required',
  //     'potongan_tenor' => 'required',
  //   ]);

  //   if ($validator->fails()) {
  //     flash()->addError("Inputkan semua data dengan benar!");
  //     return redirect()->back()->withErrors($validator)->withInput();
  //   }

  //   $affectedRows = CicilanMotor::where('id_motor', $request->motor)
  //     ->where('id_leasing', $request->leasing)
  //     ->where('tenor', $request->tenor)
  //     ->where('id_lokasi', $request->lokasi)
  //     ->update(['potongan_tenor' => $request->potongan_tenor]);

  //   if ($affectedRows > 0) {
  //     flash()->addSuccess("Data berhasil dirubah!");
  //   } else {
  //     flash()->addError("Data tidak ditemukan isikan input dengan benar!");
  //   }

  //   return redirect()->back();
  // }

  public function deleteCicilan(Request $request)
  {
    // $validator = Validator::make($request->all(), [
    //   'motor' => 'required_with:lokasi',
    //   'leasing' => 'required_with:lokasi,motor',
    //   'tenor' => 'required_with:motor,leasing,lokasi',
    // ]);

    // if ($validator->fails()) {
    //   flash()->addError("Inputkan semua data dengan benar!");
    //   return redirect()->back()->withErrors($validator)->withInput();
    // }

    $idMotor = $request->input('motor');
    $idLeasing = $request->input('leasing');
    $tenor = $request->input('tenor');
    $idKota = $request->input('lokasi');

    try {
      // Now, proceed with deleting the data based on the given inputs
      $query = CicilanMotor::query();

      if ($idMotor) {
        $query->where('id_motor', $idMotor);
      }

      if ($idLeasing) {
        $query->where('id_leasing', $idLeasing);
      }

      if ($tenor) {
        $query->where('tenor', $tenor);
      }

      if ($idKota) {
        $query->where('id_lokasi', $idKota);
      }

      $deletedRows = $query->delete();
      flash()->addSuccess("Berhasil hapus data");
    } catch (\Throwable $th) {
      //throw $th;
      flash()->addError("Gagal hapus data" . $th->getMessage());
    } finally {
      return redirect()->back();
    }

    if ($deletedRows > 0) {
      flash()->addSuccess("Berhasil hapus data");
    } else {
      flash()->addError("Gagal hapus data");
    }

    return redirect()->back();
  }


  public function dataTable(Request $request)
  {
    // dd($request->all());
    $motor = $request->input('motor');
    $leasing = $request->input('leasing');
    $lokasi = $request->input('kota');
    $tenor = $request->input('tenor');

    $query = CicilanMotor::with(['motor', 'leasingMotor', 'kota'])
      ->when($leasing, function ($query) use ($leasing) {
        $query->where('id_leasing', $leasing);
      })
      ->when($lokasi, function ($query) use ($lokasi) {
        $query->where('id_lokasi', $lokasi);
      })
      ->when($tenor, function ($query) use ($tenor) {
        $query->where('tenor', $tenor);
      })
      ->when($motor, function ($query) use ($motor) {
        $query->where('id_motor', $motor);
      });

    return DataTables::of($query)
      ->addColumn('action', function ($row) {
        $editUrl = route('admin.cicilan.edit', $row->id);
        $deleteUrl = route('admin.cicilan.destroy', $row->id);

        return '<div class="d-flex justify-content-between">
                        <a href="' . $editUrl . '" class="btn btn-warning">Edit</a>
                        <form action="' . $deleteUrl . '" method="post">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                        </form>
                    </div>';
      })
      ->filter(function ($query) use ($request) {
        if ($search = $request->get('search')['value']) {
          $query->where(function ($query) use ($search) {
            $query->whereHas('motor', function ($query) use ($search) {
              $query->where('nama', 'LIKE', "%$search%");
            })
              ->orWhereHas('leasingMotor', function ($query) use ($search) {
                $query->where('nama', 'LIKE', "%$search%");
              })
              ->orWhereHas('kota', function ($query) use ($search) {
                $query->where('nama', 'LIKE', "%$search%");
              });
          });
        }
      })
      ->rawColumns(['action'])
      ->make(true);
  }
}
