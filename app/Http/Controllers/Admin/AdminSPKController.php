<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use App\Models\Motor;
use App\Models\Penjualan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Symfony\Component\Console\Input\Input;

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
      'tanggal_dibuat' => 'required',
      'no_ktp' => 'required',
      'nama_pemohon' => 'required',
      'kabupaten' => 'required',
      'bpkb_stnk' => 'required',
      'nomor_hp' => 'required',
      'warna' => 'required',
      'kelengkapan' => 'required',
      'metode_pembayaran' => 'required_without:metode_lainnya',
      'metode_lainnya' => 'required_without:metode_pembayaran',
      'id_penjualan' => 'required',
      'alamat' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    $motor = Motor::with('type')
      ->where('id', $request->input('motor'))
      ->first();

    $idPenjualan = $request->input('id_penjualan');
    $penjualan = Penjualan::find($idPenjualan);

    if (!$penjualan) {
      flash()->addError("Penjualan not found!");
      return redirect()->back();
    }

    $penjualan->is_cetak = 1;
    $penjualan->save();

    $nomorUrut = sprintf('%03d', $idPenjualan);
    $bulanRomawi = $this->toRoman(date('n'));
    $tahun = date('Y');
    $nomorSPK = $nomorUrut . '/SPK/' . $bulanRomawi . '/' . $tahun;

    $dp = $request->input('dp');
    $totalDiskon = $request->input('total_diskon');
    $totalBayar =  $dp - $totalDiskon;

    $harga = $this->formatRupiah($motor->harga);
    $totalBayar = $this->formatRupiah($totalBayar);
    $dp = $this->formatRupiah($dp);
    $totalDiskon = $this->formatRupiah($totalDiskon);

    $data = [
      'nomor_spk' => $nomorSPK,
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
      'kelengkapan' => $request->input('kelengkapan'),
      'dp' => $dp,
      'total_diskon' => $totalDiskon,
      'sisa_bayar' => $totalBayar,
      'metode_pembayaran' => $request->input('metode_pembayaran'),
      'metode_lainnya' => $request->input('metode_lainnya'),
      'jangka_waktu' => $request->input('jangka_waktu'),
      'alamat' => $request->input('alamat'),
    ];

    // Path ke gambar
    $pathToImage = public_path('assets/images/logo/Logo-blimoto.webp');

    // Pastikan file gambar ada
    if (file_exists($pathToImage)) {
      // Baca isi file gambar
      $type = pathinfo($pathToImage, PATHINFO_EXTENSION);
      $dataImage = file_get_contents($pathToImage);

      // Konversi ke base64
      $base64 = 'data:image/' . $type . ';base64,' . base64_encode($dataImage);
    } else {
      // Handle error jika file tidak ditemukan
      $base64 = null; // Atau set default image
    }

    // Tambahkan string base64 ke data yang akan dikirim ke view
    $data['logo_base64'] = $base64;



    // $pdf = Pdf::loadView('admin.spk.spk', $data);
    // return $pdf->download();
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML(view('admin.spk.spk', $data));
    $mpdf->Output();

    // return view('admin.spk.spk', $data);
  }

  private function formatRupiah($angka)
  {
    return "Rp " . number_format($angka, 0, ',', '.');
  }

  function toRoman($number)
  {
    $map = [
      'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
      'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40,
      'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1
    ];
    $returnValue = '';
    while ($number > 0) {
      foreach ($map as $roman => $int) {
        if ($number >= $int) {
          $number -= $int;
          $returnValue .= $roman;
          break;
        }
      }
    }
    return $returnValue;
  }
}
