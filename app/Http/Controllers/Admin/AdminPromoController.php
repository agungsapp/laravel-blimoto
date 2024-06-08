<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminPromoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $promo = Promo::orderBy('id', 'desc')->get();

    return view('admin.promo.index', [
      'promo' => $promo,
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
    // dd($request->all());
    $validator = Validator::make($request->all(), [
      'judul' => 'required',
      'tanggal_promo' => 'required',
      'tanggal_berakhir' => 'required',
      'deskripsi' => 'required',
      'nomor' => 'required',
      'gambar_promo' => 'required|mimes:jpeg,png,jpg,webp',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $lowercaseTitle = strtolower($request->input('judul'));
    $existingPromo = Promo::whereRaw('LOWER(judul) = ?', [$lowercaseTitle])->first();
    if ($existingPromo) {
      flash()->addError("Promo dengan judul {$request->input('judul')} sudah ada!");
      return redirect()->back()->withInput();
    }

    try {
      // Periksa apakah gambar diunggah
      if ($request->hasFile('gambar_promo')) {
        // Mengambil file gambar yang diunggah
        $gambar = $request->file('gambar_promo');

        // Generate nama unik untuk gambar dengan menggunakan tanggal
        $waktu = Carbon::now();
        $gambarName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();

        // Pindahkan gambar ke direktori yang sesuai (misalnya, public/assets/images/custom/hook/)
      }

      $tanggalPromo = Carbon::createFromFormat('m/d/Y', $request->input('tanggal_promo'))->format('Y-m-d');
      $tanggalBerakhir = Carbon::createFromFormat('m/d/Y', $request->input('tanggal_berakhir'))->format('Y-m-d');
      Promo::create([
        'judul' => $request->input('judul'),
        'deskripsi' => $request->input('deskripsi'),
        'thumbnail' => $gambarName,
        'tanggal_promo' => $tanggalPromo,
        'tanggal_berakhir' => $tanggalBerakhir,
        'nomor' => $request->input('nomor'),
      ]);

      $gambar->move(public_path('assets/images/custom/promo/'), $gambarName);
      flash()->addSuccess("Promo berhasil dibuat");
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
  public function edit(Request $request, $id)
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
    // dd($request->all());
    $validator = Validator::make($request->all(), [
      'judul' => 'required',
      'tanggal_promo' => 'required',
      'tanggal_berakhir' => 'required',
      'nomor' => 'required',
      'deskripsi' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      $gambar_promo = Promo::findOrFail($id);
      $tanggalPromo = Carbon::createFromFormat('m/d/Y', $request->input('tanggal_promo'))->format('Y-m-d');
      $tanggalBerakhir = Carbon::createFromFormat('m/d/Y', $request->input('tanggal_berakhir'))->format('Y-m-d');

      // Periksa apakah ada file gambar yang diunggah
      if ($request->hasFile('gambar_promo')) {
        // Mengambil file gambar yang diunggah
        $gambar = $request->file('gambar_promo');

        // Generate nama unik untuk gambar dengan menggunakan tanggal
        $waktu = Carbon::now();
        $gambarName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();

        // Pindahkan gambar ke direktori yang sesuai (misalnya, public/assets/images/custom/promo/)
        $gambar->move(public_path('assets/images/custom/promo/'), $gambarName);

        // Hapus gambar lama jika ada
        if ($gambar_promo->gambar) {
          // Pastikan Anda menghapus gambar yang lama dari direktori
          $gambarLama = public_path('assets/images/custom/promo/' . $gambar_promo->gambar);
          if (file_exists($gambarLama)) {
            unlink($gambarLama);
          }
        }

        // Update kolom gambar dengan nama gambar yang baru
        $gambar_promo->update([
          'thumbnail' => $gambarName,
        ]);
      }
      $gambar_promo->update([
        'judul' => $request->input('judul'),
        'tanggal_promo' => $tanggalPromo,
        'tanggal_berakhir' => $tanggalBerakhir,
        'deskripsi' => $request->input('deskripsi'),
        'nomor' => $request->input('nomor'),
      ]);

      flash()->addSuccess("Promo $gambar_promo->judul berhasil diperbarui");
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
    try {
      $event = Promo::findOrFail($id);
      $gambarLama = public_path('assets/images/custom/promo/' . $event->thumbnail);
      if (file_exists($gambarLama)) {
        unlink($gambarLama);
      }
      $event->delete();
      flash()->addSuccess("Berhasil menghapus promo!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Promo tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }
}
