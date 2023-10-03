<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dealer;
use App\Models\Kota;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminDealerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data = [
      'kota' => Kota::all(),
      'dealer' => Dealer::with('kota')->get()
    ];

    return view('admin.dealer.index', $data);
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
      'alamat' => 'required',
      'telpon' => 'required',
      'kota' => 'required',
      'link-map' => 'required',
      'gambar-dealer' => 'required|mimes:jpeg,png,jpg,webp',
    ], ['gambar-dealer.required' => 'gambar tidak boleh kosong !']);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      // Periksa apakah gambar diunggah
      if ($request->hasFile('gambar-dealer')) {
        // Mengambil file gambar yang diunggah
        $gambar = $request->file('gambar-dealer');

        // Generate nama unik untuk gambar dengan menggunakan tanggal
        $waktu = Carbon::now();
        $gambarName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();

        // Pindahkan gambar ke direktori yang sesuai (misalnya, public/assets/images/custom/hook/)
        $gambar->move(public_path('assets/images/dealers/'), $gambarName);
      }

      $dealer = Dealer::create([
        'nama' => $request->input('nama'),
        'alamat' => $request->input('alamat'),
        'telpon' => $request->input('telpon'),
        'link_map' => $request->input('link-map'),
        'id_kota' => $request->input('kota'),
        'gambar' => $gambarName,
      ]);

      flash()->addSuccess("dealer $dealer->nama berhasil dibuat");
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
      'alamat' => 'required',
      'telpon' => 'required',
      'kota' => 'required',
      'link-map' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    try {
      $dealer = Dealer::findOrFail($id);

      // Periksa apakah ada file gambar yang diunggah
      if ($request->hasFile('gambar-dealer')) {
        // Mengambil file gambar yang diunggah
        $gambar = $request->file('gambar-dealer');

        // Generate nama unik untuk gambar dengan menggunakan tanggal
        $waktu = Carbon::now();
        $gambarName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();

        // Pindahkan gambar ke direktori yang sesuai (misalnya, public/assets/images/detail-dealer/)
        $gambar->move(public_path('assets/images/dealers/'), $gambarName);

        // Hapus gambar lama jika ada
        if ($dealer->gambar) {
          // Pastikan Anda menghapus gambar yang lama dari direktori
          $gambarLama = public_path('assets/images/dealers/' . $dealer->gambar);
          if (file_exists($gambarLama)) {
            unlink($gambarLama);
          }
        }

        // Update kolom gambar dengan nama gambar yang baru
        $dealer->update([
          'gambar' => $gambarName,
        ]);
      }

      // Update data lainnya
      $dealer->update([
        'nama' => $request->input('nama'),
        'alamat' => $request->input('alamat'),
        'telpon' => $request->input('telpon'),
        'link_map' => $request->input('link-map'),
        'id_kota' => $request->input('kota'),
      ]);

      flash()->addSuccess("Dealer $dealer->nama berhasil diperbarui");
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
    $dealer = Dealer::findOrFail($id);
    try {
      $gambarLama = public_path('assets/images/dealers/' . $dealer->gambar);
      if (file_exists($gambarLama)) {
        unlink($gambarLama);
      }
      $dealer->delete();
      flash()->addSuccess("Berhasil menghapus dealer!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("$dealer->name tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }
}
