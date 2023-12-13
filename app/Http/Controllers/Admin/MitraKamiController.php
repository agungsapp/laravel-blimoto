<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MitraKamiController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $mitra = Mitra::orderBy('id', 'desc')->get();
    return view('admin.mitra-kami.index', [
      'mitra' => $mitra,
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
      'nama' => 'required',
      'gambar-mitra' => 'required|mimes:jpeg,png,jpg,webp',
    ], ['gambar-mitra.required' => 'gambar tidak boleh kosong !']);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $lowercaseName = strtolower($request->input('nama'));
    $existingMitra = Mitra::whereRaw('LOWER(nama) = ?', [$lowercaseName])->first();
    if ($existingMitra) {
      flash()->addError("Mitra dengan nama {$request->input('nama')} sudah ada!");
      return redirect()->back()->withInput();
    }

    try {
      // Periksa apakah gambar diunggah
      if ($request->hasFile('gambar-mitra')) {
        // Mengambil file gambar yang diunggah
        $gambar = $request->file('gambar-mitra');

        // Generate nama unik untuk gambar dengan menggunakan tanggal
        $waktu = Carbon::now();
        $gambarName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();

        // Pindahkan gambar ke direktori yang sesuai (misalnya, public/assets/images/custom/hook/)
        $gambar->move(public_path('assets/images/custom/mitra/'), $gambarName);
      }

      $mitra = Mitra::create([
        'nama' => $request->input('nama'),
        'gambar' => $gambarName,
      ]);

      flash()->addSuccess("Mitra $mitra->nama berhasil dibuat");
      return redirect()->back();
    } catch (\Throwable $th) {
      throw $th;
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
      'nama' => 'required',
      'gambar-mitra' => 'mimes:jpeg,png,jpg,webp',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    try {
      $mitra = Mitra::findOrFail($id);

      // Periksa apakah ada file gambar yang diunggah
      if ($request->hasFile('gambar-mitra')) {
        // Mengambil file gambar yang diunggah
        $gambar = $request->file('gambar-mitra');

        // Generate nama unik untuk gambar dengan menggunakan tanggal
        $waktu = Carbon::now();
        $gambarName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();

        // Pindahkan gambar ke direktori yang sesuai (misalnya, public/assets/images/detail-mitra/)
        $gambar->move(public_path('assets/images/custom/mitra/'), $gambarName);

        // Hapus gambar lama jika ada
        if ($mitra->gambar) {
          // Pastikan Anda menghapus gambar yang lama dari direktori
          $gambarLama = public_path('assets/images/custom/mitra/' . $mitra->gambar);
          if (file_exists($gambarLama)) {
            unlink($gambarLama);
          }
        }

        // Update kolom gambar dengan nama gambar yang baru
        $mitra->update([
          'gambar' => $gambarName,
        ]);
      }

      // Update data lainnya
      $mitra->update([
        'nama' => $request->input('nama'),
      ]);

      flash()->addSuccess("Mitra $mitra->nama berhasil diperbarui");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Gagal memperbarui data pastikan sudah benar!");
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
    $mitra = Mitra::findOrFail($id);
    try {
      $gambarLama = public_path('assets/images/custom/mitra/' . $mitra->gambar);
      if (file_exists($gambarLama)) {
        unlink($gambarLama);
      }
      $mitra->delete();
      flash()->addSuccess("Berhasil menghapus mitra!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("$mitra->name tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }
}
