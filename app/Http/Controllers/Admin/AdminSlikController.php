<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slik;
use App\Models\TypeSlik;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class AdminSlikController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $data = [
      'slik' => Slik::with('typeSlik')->get(),
      'typeSlik' => TypeSlik::all(),
    ];

    return view('admin.slik-bi.index', $data);
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
      'no' => ['required', 'regex:/^(?:\+?62|0)[0-9]{9,13}$/'],
      'email' => ['sometimes', 'nullable', 'email'],
      'tipe' => 'required',
      'status' => 'required',
      'ktp' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
      'kk' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
    ], [
      'no.required' => 'Nomor WA harus diisi.',
      'no.regex' => 'Format Nomor WA tidak valid.',
      'email.email' => 'Format alamat email tidak valid.',
      'tipe.required' => 'Jenis BI Checking harus dipilih.',
      'ktp.required' => 'Scan KTP harus diunggah.',
      'ktp.image' => 'File KTP harus berupa gambar.',
      'ktp.mimes' => 'File KTP harus berformat jpeg, png, jpg, atau webp.',
      'ktp.max' => 'Ukuran file KTP tidak boleh lebih dari 2048 kilobytes.',
      'kk.required' => 'Scan KK harus diunggah.',
      'kk.image' => 'File KK harus berupa gambar.',
      'kk.mimes' => 'File KK harus berformat jpeg, png, jpg, atau webp.',
      'kk.max' => 'Ukuran file KK tidak boleh lebih dari 2048 kilobytes.',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      $tipe = intval(request()->input('tipe'));
      $ktp = $request->file('ktp');
      $kk = $request->file('kk');
      $waktu = Carbon::now();
      $ktpName = $waktu->toDateString() . '_' . $ktp->getClientOriginalName();
      $kkName = $waktu->toDateString() . '_' . $kk->getClientOriginalName();

      $ktp->move(public_path('assets/images/slik/ktp/'), $ktpName);
      $kk->move(public_path('assets/images/slik/kk/'), $kkName);

      Slik::create([
        'no' => $request->input('no'),
        'email' => $request->input('email') ?? null,
        'ktp' => $ktpName,
        'kk' => $kkName,
        'status' => $request->input('status'),
        'status_pembayaran' => $tipe === 2 ? 'free' : $request->input('status_pembayaran'),
        'id_type_slik' => $tipe,
      ]);

      flash()->addSuccess("Berhasil menambah data");
      return redirect()->back();
    } catch (\Throwable $th) {
      throw $th;
      flash()->addError("Error silahkan coba beberapa saat lagi");
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
    // Validasi data input
    $validator = Validator::make($request->all(), [
      'no' => ['required', 'regex:/^(?:\+?62|0)[0-9]{9,13}$/'],
      'email' => ['sometimes', 'nullable', 'email'],
      'tipe' => 'required',
      'status' => 'required',
      'ktp' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
      'kk' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
    ], [
      'no.required' => 'Nomor WA harus diisi.',
      'no.regex' => 'Format Nomor WA tidak valid.',
      'email.email' => 'Format alamat email tidak valid.',
      'tipe.required' => 'Jenis BI Checking harus dipilih.',
      'ktp.image' => 'File KTP harus berupa gambar.',
      'ktp.mimes' => 'File KTP harus berformat jpeg, png, jpg, atau webp.',
      'ktp.max' => 'Ukuran file KTP tidak boleh lebih dari 2048 kilobytes.',
      'kk.image' => 'File KK harus berupa gambar.',
      'kk.mimes' => 'File KK harus berformat jpeg, png, jpg, atau webp.',
      'kk.max' => 'Ukuran file KK tidak boleh lebih dari 2048 kilobytes.',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    try {
      $slik = Slik::find($id);

      if ($request->hasFile('ktp')) {

        $gambarLama = public_path('assets/images/slik/ktp/' . $slik->ktp);
        if (file_exists($gambarLama) && $slik->ktp) {
          unlink($gambarLama);
        }
        $gambar = $request->file('ktp');

        $waktu = Carbon::now();
        $ktpName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();

        $gambar->move(public_path('assets/images/slik/ktp/'), $ktpName);
        $slik->ktp = $ktpName;
      }

      if ($request->hasFile('kk')) {

        $gambarLama = public_path('assets/images/slik/kk/' . $slik->kk);
        if (file_exists($gambarLama) && $slik->kk) {
          unlink($gambarLama);
        }
        $gambar = $request->file('kk');

        $waktu = Carbon::now();
        $kkName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();

        $gambar->move(public_path('assets/images/slik/kk/'), $kkName);
        $slik->kk = $kkName;
      }
      $tipe = intval($request->input('tipe'));
      $slik->no = $request->input('no');
      $slik->email = $request->input('email') ?? null;
      $slik->status = $request->input('status');
      $slik->id_type_slik = $tipe;
      $slik->status_pembayaran = $tipe === 2 ? 'free' : $request->input('status_pembayaran');

      $slik->save();

      flash()->addSuccess("Data berhasil diupdate");
      return redirect()->back();
    } catch (\Throwable $th) {
      throw $th;
      flash()->addError("Data gagal di update");
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
    $slik = Slik::findOrFail($id);
    try {
      $gambarKK = public_path('assets/images/slik/kk/' . $slik->kk);
      $gambarktp = public_path('assets/images/slik/ktp/' . $slik->ktp);
      if (file_exists($gambarKK) && $slik->kk) {
        unlink($gambarKK);
      }
      if (file_exists($gambarktp) && $slik->ktp) {
        unlink($gambarktp);
      }
      $slik->delete();
      flash()->addSuccess("Berhasil menghapus data!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }
}
