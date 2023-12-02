<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hook;
use App\Models\Slik;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserCekSlikController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data = [
      'hooks' => Hook::where('status', 1)
        ->orderBy('order', 'asc')->get(),
    ];

    return view('user.cek_slik.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
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
      'tipe' => 'required',
      'ktp' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
      'email' => ['sometimes', 'nullable', 'email'],
    ], [
      'no.required' => 'Nomor WA harus diisi.',
      'no.regex' => 'Format Nomor WA tidak valid.',
      'tipe.required' => 'Jenis BI Checking harus dipilih.',
      'ktp.required' => 'Scan KTP harus diunggah.',
      'ktp.image' => 'File KTP harus berupa gambar.',
      'ktp.mimes' => 'File KTP harus berformat jpeg, png, jpg, atau webp.',
      'ktp.max' => 'Ukuran file KTP tidak boleh lebih dari 2048 kilobytes.',
      'email.email' => 'Format alamat email tidak valid.',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      $tipe = intval(request()->input('tipe'));
      $ktp = $request->file('ktp');
      $waktu = Carbon::now();
      $ktpName = $waktu->toDateString() . '_' . $ktp->getClientOriginalName();

      // Perform the data storage within this try block
      Slik::create([
        'no' => $request->input('no'),
        'email' => $request->input('email') ?? null,
        'ktp' => $ktpName,
        'status' => 'pending',
        'status_pembayaran' => $tipe === 1 ? 'pending' : 'free',
        'id_type_slik' => $tipe,
      ]);

      // Move the image only if the data storage is successful
      $ktp->move(public_path('assets/images/slik/ktp/'), $ktpName);

      flash()->addSuccess("Hasil BI akan dikirimkan paling cepat 3 hari");
      return redirect()->back();
    } catch (\Throwable $th) {
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
