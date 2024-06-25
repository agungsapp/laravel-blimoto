<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BestMotor;
use App\Models\DiskonMotor;
use App\Models\Kota;
use App\Models\LeasingMotor;
use App\Models\Merk;
use App\Models\Motor;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class AdminDiskonMotorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $motor = Motor::select('id', 'nama')->get();
    $leasing = LeasingMotor::select('id', 'nama')->get();
    $lokasi = Kota::select('id', 'nama')->get();
    $diskonMotor = DiskonMotor::with('motor', 'leasing', 'lokasi')
      ->orderBy('id', 'desc')
      ->get();;

    return view('admin.diskon-motor.index', [
      'motor' => $motor,
      'leasing' => $leasing,
      'lokasi' => $lokasi,
      'diskon_motor' => $diskonMotor,
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
    $validator = Validator::make($request->all(), [
      'nama_motor' => 'required',
      'leasing_motor' => 'required',
      'lokasi_motor' => 'required',
      'tenor' => 'required',
      'diskon' => 'required',
      'diskon_dealer' => 'required',
      'diskon_promo' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $potonganTenor = $request->input('potongan_tenor') ?? 0;

    try {
      $diskonMotor = DiskonMotor::firstOrNew([
        'id_motor' => $request->input('nama_motor'),
        'id_leasing' => $request->input('leasing_motor'),
        'id_lokasi' => $request->input('lokasi_motor'),
        'tenor' => $request->input('tenor'),
      ]);

      if ($diskonMotor->exists) {
        flash()->addError("Data diskon sudah ada.");
        return redirect()->back()->withErrors($validator)->withInput();
      } else {
        $diskonMotor->fill([
          'diskon' => $request->input('diskon'),
          'diskon_dealer' => $request->input('diskon_dealer'),
          'diskon_promo' => $request->input('diskon_promo'),
          'potongan_tenor' => $potonganTenor,
        ])->save();

        flash()->addSuccess("Diskon motor berhasil dibuat");
        return redirect()->back();
      }

      flash()->addSuccess("Diskon motor berhasil dibuat");
      return redirect()->back();
    } catch (\Throwable $th) {
      throw $th;
      flash()->addError("Gagal membuat data pastika n sudah benar!");
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
    $validator = Validator::make($request->all(), [
      'nama_motor' => 'required',
      'leasing_motor' => 'required',
      'lokasi_motor' => 'required',
      'tenor' => 'required',
      'potongan_tenor' => 'required',
      'diskon' => 'required',
      'diskon_dealer' => 'required',
      'diskon_promo' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $diskonMotor = DiskonMotor::findOrFail($id);
    $diskonMotor->id_motor = $request->input('nama_motor');
    $diskonMotor->id_leasing = $request->input('leasing_motor');
    $diskonMotor->id_lokasi = $request->input('lokasi_motor');
    $diskonMotor->tenor = $request->input('tenor');
    $diskonMotor->potongan_tenor = $request->input('potongan_tenor');
    $diskonMotor->diskon = $request->input('diskon');
    $diskonMotor->diskon_dealer = $request->input('diskon_dealer');
    $diskonMotor->diskon_promo = $request->input('diskon_promo');

    $diskonMotor->save();
    flash()->addSuccess("Berhasil merubah diskon motor!");
    return redirect()->to(route('admin.diskon-motor.index'));
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
      $diskonMotor = DiskonMotor::findOrFail($id);
      $diskonMotor->delete();
      flash()->addSuccess("Berhasil menghapus diskon motor!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Diskon tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }
}
