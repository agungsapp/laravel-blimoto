<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminEventController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $event = Event::all();

    return view('admin.event.index', [
      'event' => $event,
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
      'tanggal' => 'required',
      'deskripsi' => 'required',
      'gambar_event' => 'required|mimes:jpeg,png,jpg,webp',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      // Periksa apakah gambar diunggah
      if ($request->hasFile('gambar_event')) {
        // Mengambil file gambar yang diunggah
        $gambar = $request->file('gambar_event');

        // Generate nama unik untuk gambar dengan menggunakan tanggal
        $waktu = Carbon::now();
        $gambarName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();

        // Pindahkan gambar ke direktori yang sesuai (misalnya, public/assets/images/custom/hook/)
        $gambar->move(public_path('assets/images/event/'), $gambarName);
      }

      Event::create([
        'judul' => $request->input('judul'),
        'deskripsi' => $request->input('deskripsi'),
        'thumbnail' => $gambarName,
        'tanggal_event' => $request->input('tanggal'),
      ]);
      flash()->addSuccess("Event berhasil dibuat");
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
      'tanggal_update' => 'required',
      'deskripsi' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      $gambar_event = Event::findOrFail($id);

      // Periksa apakah ada file gambar yang diunggah
      if ($request->hasFile('gambar_event')) {
        // Mengambil file gambar yang diunggah
        $gambar = $request->file('gambar_event');

        // Generate nama unik untuk gambar dengan menggunakan tanggal
        $waktu = Carbon::now();
        $gambarName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();

        // Pindahkan gambar ke direktori yang sesuai (misalnya, public/assets/images/event/)
        $gambar->move(public_path('assets/images/event/'), $gambarName);

        // Hapus gambar lama jika ada
        if ($gambar_event->gambar) {
          // Pastikan Anda menghapus gambar yang lama dari direktori
          $gambarLama = public_path('assets/images/event/' . $gambar_event->gambar);
          if (file_exists($gambarLama)) {
            unlink($gambarLama);
          }
        }

        // Update kolom gambar dengan nama gambar yang baru
        $gambar_event->update([
          'thumbnail' => $gambarName,
        ]);
      }
      $gambar_event->update([
        'judul' => $request->input('judul'),
        'tanggal_event' => $request->input('tanggal_update'),
        'deskripsi' => $request->input('deskripsi'),
      ]);

      flash()->addSuccess("Event $gambar_event->judul berhasil diperbarui");
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
      $event = Event::findOrFail($id);
      $gambarLama = public_path('assets/images/event/' . $event->thumbnail);
      if (file_exists($gambarLama)) {
        unlink($gambarLama);
      }
      $event->delete();
      flash()->addSuccess("Berhasil menghapus event!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Event tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }
}
