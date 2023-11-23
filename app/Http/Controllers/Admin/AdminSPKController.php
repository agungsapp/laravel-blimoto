<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use App\Models\Motor;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

use function React\Promise\all;

class AdminSPKController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    return view('admin.spk.index');
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
      'nama' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    try {
      $kota = Kota::create([
        'nama' => $request->input('nama')
      ]);
      flash()->addSuccess("kota $kota->nama berhasil dibuat");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Gagal membuat data pastikan sudah benar!");
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
      'nama_edit' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    // Find the Type model by id
    $type = Kota::findOrFail($id);

    // Update the Type model
    $type->nama = $request->nama_edit;
    $type->save();

    // Redirect back with a success message
    flash()->addSuccess("Berhasil merubah kota!");
    return redirect()->back();
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
      $type = Kota::findOrFail($id);
      $type->delete();
      flash()->addSuccess("Berhasil menghapus kota!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("$type->name tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }

  public function cetakPDF(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'motor' => 'required',
      'dp' => 'required',
      'total_diskon' => 'required',
      'nomor_spk' => 'required',
      'tanggal_dibuat' => 'required',
      'no_ktp' => 'required',
      'nama_pemohon' => 'required',
      'kabupaten' => 'required',
      'bpkb_stnk' => 'required',
      'nomor_hp' => 'required',
      'warna' => 'required',
      'ket_program' => 'required',
      'nama_diskon' => 'required',
      'kelengkapan' => 'required',
      'metode_pembayaran' => 'required_without:metode_lainnya',
      'metode_lainnya' => 'required_without:metode_pembayaran',
      'jangka_waktu' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    $motor = Motor::with('type')
      ->where('id', $request->input('motor'))
      ->first();

    $dp = $request->input('dp');
    $totalDiskon = $request->input('total_diskon');
    $totalBayar =  $dp - $totalDiskon;

    $harga = $this->formatRupiah($motor->harga);
    $totalBayar = $this->formatRupiah($totalBayar);
    $dp = $this->formatRupiah($dp);
    $totalDiskon = $this->formatRupiah($totalDiskon);

    $data = [
      'nomor_spk' => $request->input('nomor_spk'),
      'tanggal_pesan' => $request->input('tanggal_dibuat'),
      'no_ktp' => $request->input('no_ktp'),
      'nama_pemohon' => $request->input('nama_pemohon'),
      'kabupaten' => $request->input('kabupaten'),
      'bpkb_stnk' => $request->input('bpkb_stnk'),
      'nomor_hp' => $request->input('nomor_hp'),
      'unit' => $motor->nama,
      'type' => $motor->type->nama,
      'harga' => $harga,
      'warna' => $request->input('warna'),
      'ket_program' => $request->input('ket_program'),
      'nama_diskon' => $request->input('nama_diskon'),
      'kelengkapan' => $request->input('kelengkapan'),
      'dp' => $dp,
      'total_diskon' => $totalDiskon,
      'sisa_bayar' => $totalBayar,
      'metode_pembayaran' => $request->input('metode_pembayaran'),
      'metode_lainnya' => $request->input('metode_lainnya'),
      'jangka_waktu' => $request->input('jangka_waktu'),
    ];

    return view('admin.spk.spk', $data);
  }

  private function formatRupiah($angka)
  {
    return "Rp " . number_format($angka, 0, ',', '.');
  }
}
