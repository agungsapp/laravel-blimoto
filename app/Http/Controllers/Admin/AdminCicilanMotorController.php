<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrosurMotor;
use App\Models\CicilanMotor;
use App\Models\Kota;
use App\Models\LeasingMotor;
use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    flash()->addSuccess("Data csv berhasil diimport");
    return redirect()->back();
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
    $validator = Validator::make($request->all(), [
      'motor' => 'required',
      'tenor' => 'required',
      'leasing' => 'required',
      'lokasi' => 'required'
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $idMotor = $request->input('motor');
    $idLeasing = $request->input('leasing');
    $tenor = $request->input('tenor');
    $idKota = $request->input('lokasi');

    $deletedRows = CicilanMotor::deleteData($idMotor, $idLeasing, $tenor, $idKota);


    if ($deletedRows > 0) {
      flash()->addSuccess("Berhasil hapus data");
    } else {
      flash()->addError("Gagal hapus data");
    }

    return redirect()->back();
  }

  public function dataTable(Request $request)
  {
    $motor = $request->input('motor');
    $leasing = $request->input('leasing');
    $lokasi = $request->input('lokasi');
    $tenor = $request->input('tenor');

    $cicilan = CicilanMotor::getCicilanTable($motor, $leasing, $lokasi, $tenor);
    return DataTables::of($cicilan)
      ->addColumn('action', function ($row) {
        $editUrl = route('admin.cicilan.edit', ['cicilan' => $row->id]);
        $deleteUrl = route('admin.cicilan.destroy', ['cicilan' => $row->id]);

        return '<div class="d-flex justify-content-between">
                    <a href="' . $editUrl . '" class="btn btn-warning">Edit</a>
                    <form action="' . $deleteUrl . '" method="post">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                    </form>
                </div>';
      })
      ->rawColumns(['action'])
      ->make(true);
  }
}
