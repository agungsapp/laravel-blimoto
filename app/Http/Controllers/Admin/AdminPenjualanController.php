<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AksesPenjualanModel;
use App\Models\CicilanMotor;
use App\Models\ColorModel;
use App\Models\DetailPembayaranModel;
use App\Models\Hasil;
use App\Models\Kota;
use App\Models\LeasingMotor;
use App\Models\Motor;
use App\Models\Pembayaran;
use App\Models\Penjualan;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminPenjualanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {

    // $debug = optional($data[0]->refund->status_pengajuan);
    // dd($debug);
    $kota = Kota::all();
    $hasil = Hasil::all();
    $motor = Motor::all();
    $leasing = LeasingMotor::all();
    $sales = Sales::all();
    $colors = ColorModel::all();
    $tenorOptions = CicilanMotor::distinct('tenor')->pluck('tenor');



    // dd($sales);

    return view('admin.penjualan.penjualan', [
      // 'penjualan' => $data,
      'kota' => $kota,
      'hasil' => $hasil,
      'motor' => $motor,
      'leasing' => $leasing,
      'sales' => $sales,
      'colors' => $colors,
      'tenors' => $tenorOptions

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

    Log::channel('penjualan')->info("SEMUA DATA YANG DI TERIMA PENJUAALAN : ", ['data' => $request->all()]);

    $cicilan = CicilanMotor::where('id_motor', $request->input('motor'))
      ->where('id_leasing', $request->input('leasing'))
      ->where('tenor', $request->input('tenor'))->first();


    $motor = Motor::with(['cicilanMotor' => function ($motor) use ($request) {
      $motor->where('id_motor', $request->motor)
        ->where('id_leasing', $request->leasing)
        ->where('tenor', $request->tenor)
        ->first();
    }, 'diskonMotor' => function ($diskon) use ($request) {
      $diskon->where('id_leasing', $request->leasing)
        ->where('tenor', $request->tenor)
        ->first();
    }])->find($request->motor);

    // MUNGKIN MASIH CACAT COBA DI PERIKSA KEMBALI BESOK YA .... LAST DI SINI

    // return response()->json($motor->diskonMotor[0]->diskon);

    if (Auth::guard('sales')->check()) {
      $request->merge(['sales' => Auth::guard('sales')->id()]);
    }

    $validator = Validator::make($request->all(), [
      'konsumen' => 'required',
      'sales' => 'required',
      'metode_pembelian' => 'required',
      'kabupaten' => 'required',
      'hasil' => 'required',
      // 'dp' => 'required',
      // 'dp_asli' => 'required',
      // 'angsuran' => 'required',
      'motor' => 'required',
      'warna_motor' => 'required',
      'jumlah' => 'required',
      'status_pembayaran' => 'required',
      'metode_pembayaran' => 'required',
    ]);


    // START PENGECEKAN PO WAJIB SAAT STATUS HASIL DO
    $hasil = Hasil::find($request->hasil);
    if (strtolower($hasil->hasil) == 'do') {
      $validator->addRules([
        'nomor_po' => 'required',
      ]);
    }
    // END PENGECEKAN PO WAJIB SAAT STATUS HASIL DO


    // dd($request->all());

    if ($validator->fails()) {

      flash()->addError("Inputkan semua data dengan benar!" .  $validator->messages());
      return redirect()->back()->withInput();
    }

    $cekDp = $request->dp;
    $cekTj = $request->tj;

    // dd($cekDp, $cekTj);

    // find motor
    // dd("dp  : " . $cekDp, "minimal  : " . $motor->minimal_dp, $cekDp < $motor->minimal_dp);

    $tanggal_dibuat = Carbon::today();
    $pembelian = $request->input('metode_pembelian');
    $warna_motor = $request->input('warna_motor') ?? null;
    $tenor = $pembelian === 'cash' ? 0 : $request->tenor;
    $catatan = $request->catatan ?? '-';
    $nomorPo = $request->nomor_po ?? null;


    $motor = Motor::find($request->input('motor'));

    if ($pembelian === 'cash') {
      if ($request->tj < $motor->minimal_dp) {
        flash()->addError("Tanda Jadi minimal untuk motor {$motor->nama} adalah {$motor->minimal_dp} !");
        return redirect()->back()->withInput();
      }
    } else {
      if ($request->dp < $motor->minimal_dp) {
        flash()->addError("DP minimal untuk motor {$motor->nama} adalah {$motor->minimal_dp} !");
        return redirect()->back()->withInput();
      }
    }






    DB::beginTransaction();
    try {
      // create ke tabel penjualan start
      $penjualan = new Penjualan;
      $penjualan->nama_konsumen = $request->input('konsumen');
      // field baru
      $penjualan->nik = $request->input('nik');
      // field baru
      $penjualan->jumlah = $request->input('jumlah');
      $penjualan->catatan = $catatan;
      $penjualan->tenor = $tenor;
      $penjualan->metode_pembelian = $pembelian;
      $penjualan->metode_pembayaran = $request->input('metode_pembayaran');
      $penjualan->id_color = $warna_motor;
      $penjualan->no_hp = $request->input('no_hp') ?? null;
      $penjualan->bpkb = $request->input('bpkb') ?? null;

      if ($pembelian == 'cash') {
        // return $motor->harga;
        $penjualan->dp = $request->tj;
        $penjualan->diskon_dp = $request->input('diskon_dp') ?? 0;
      } else {
        $penjualan->diskon_dp = $motor->diskonMotor[0]->diskon_promo ?? 0;
        $penjualan->dp = $request->input('dp') ?? 0;
      }
      $penjualan->dp_asli = $request->dp_asli;
      $penjualan->angsuran = $request->angsuran;
      $penjualan->status_pembayaran_dp = $request->input('status_pembayaran');
      $penjualan->tanggal_dibuat = $tanggal_dibuat;
      $penjualan->no_po = $nomorPo;
      $penjualan->id_sales = $request->input('sales');
      $penjualan->id_kota = $request->input('kabupaten');
      $penjualan->id_hasil = $request->input('hasil');
      $penjualan->id_motor = $request->input('motor');
      $penjualan->id_lising = $request->input('leasing') ?? null;
      $penjualan->save();

      // Membuat kode transaksi
      $bulan = date('m', strtotime($penjualan->created_at));
      $tahun = date('y', strtotime($penjualan->created_at));
      $tanggal = date('d', strtotime($penjualan->created_at));
      $kode_transaksi = "BM-$bulan-$tahun-$tanggal-" . $penjualan->id;


      $penjualan->kode_transaksi = $kode_transaksi;
      $penjualan->save();
      // create ke tabel penjualan end


      // create ke tabel detail transaksi start
      $detailPembayaran = new DetailPembayaranModel();
      $detailPembayaran->id_penjualan = $penjualan->id;
      // untuk bagian ini ada update jadi kode bayar adalah kode transaksi "-" . urutan increment yang di reset perbulan
      // contoh jika kode transaksi adalah : BM-05-24-20
      // dengan rumus kode transaksi seperti sebelumnya : BM-{bulan}-{2 digit akhir tahun}-{tanggal 20}-
      // maka generate kode_bayar jadi BM-05-24-20-1 <-- ini bernilai satu karna di tabel detail pembayaran ini adalah pembayarn pertama di bulan 05
      // jadi jika ada  transaksi baru lagi maka akan menjadi = BM-06-24-20-2 dan seterusnya 
      // namun jika ternyata sekarang sudah memasuki bulan 06 . maka akan direset lagi menjadi 1 . contoh : BM-06-24-20-1
      // dengan begini harapanya tidak akan ada kode bayar yang sama. atau  bersifat uniq


      // Generate kode bayar dengan urutan increment yang direset setiap bulan
      $bulanSekarang = date('m');
      $tahunSekarang = date('Y');
      $lastDetail = DetailPembayaranModel::whereMonth('created_at', $bulanSekarang)
        ->whereYear('created_at', $tahunSekarang)
        ->orderBy('created_at', 'desc')
        ->first();
      $urutan = $lastDetail ? ((int) substr($lastDetail->kode_bayar, strrpos($lastDetail->kode_bayar, '-') + 1)) + 1 : 1;
      $detailPembayaran->kode_bayar = "$kode_transaksi-$urutan";

      if ($pembelian == 'cash') {
        $detailPembayaran->jumlah_bayar = $request->input('tj');
        // return $motor->harga;
        // $detailPembayaran->jumlah_bayar = $request->input('tj');
      } else {
        $detailPembayaran->jumlah_bayar = $request->input('dp') ?? 0;
      }

      // hanya saat kredit
      if ($pembelian == 'kredit') {
        // logika get cicilan
        $cicilan = CicilanMotor::where('id_motor', $request->input('motor'))
          ->where('id_lokasi', $request->input('kabupaten'))
          ->where('id_leasing', $request->input('leasing'))
          ->where('tenor', $request->input('tenor'))->first();

        Log::channel('penjualan')->info('DEBUG KODE_TRANSAKSI : ', ['pesan' => $kode_transaksi]);
        Log::channel('penjualan')->info('DEBUG DATA CICILAN : ', ['pesan' => $cicilan]);

        if (empty($cicilan)) {
          flash()->addError("Data cicilan tidak ditemukan !");
          return redirect()->back()->withInput();
        }
      }


      if ($pembelian == 'cash') {
        // cash
        $isLunas = ($motor->harga - $request->diskon_dp) == $request->tj;
        $detailPembayaran->sisa_bayar = ($motor->harga - $request->input('diskon_dp') ?? 0) - $request->input('tj');
        $detailPembayaran->total_lunas = $motor->harga - $request->input('diskon_dp') ?? 0;

        // return response()->json([
        //   'motor' => $motor,
        //   'diskon_dp' => $request->input('diskon_dp'),
        // ]);
      } else {
        // kredit
        $isLunas = $cicilan->dp == $request->input('dp');
        $detailPembayaran->sisa_bayar = ($request->dp_asli - $motor->diskonMotor[0]->diskon_promo ?? 0) - $request->input('dp');
        $detailPembayaran->total_lunas = $request->dp_asli - $motor->diskonMotor[0]->diskon_promo ?? 0;
      }

      // Menentukan periode
      $lastDetail = DetailPembayaranModel::where('id_penjualan', $penjualan->id)
        ->orderBy('periode', 'desc')
        ->first();
      if ($lastDetail) {
        $periode = $lastDetail->periode + 1;
      } else {
        $periode = 1;
      }
      $detailPembayaran->periode = $periode;
      $isLunas ? $detailPembayaran->status = 'pelunasan' :
        $detailPembayaran->status = 'tanda';

      $detailPembayaran->save();
      // create ke tabel detail transaksi end

      DB::commit();
      flash()->addSuccess("Penjualan $penjualan->nama_sales berhasil dibuat");
      // return redirect()->back();
      // revisi logika baru redirect sesuai data hasil

      try {
        $hasil_id = $request->input('hasil');
        $getHasilName =  Hasil::find($hasil_id);
        return redirect()->to(route("admin.penjualan." . strtolower($getHasilName->hasil) . ".index"));
      } catch (\Throwable $th) {
        return redirect()->back();
      }
    } catch (\Throwable $th) {
      Log::channel('penjualan')->info('Store Input Penjualan Error ! : ', ['pesan' => $th]);
      DB::rollBack();
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
    // dd($id);

    $kota = Kota::all();
    $hasil = Hasil::all();
    $motor = Motor::all();
    $leasing = LeasingMotor::all();
    $sales = Sales::all();
    $colors = ColorModel::all();
    $tenorOptions = CicilanMotor::distinct('tenor')->pluck('tenor');

    $penjualan = Penjualan::find($id);
    // dd($penjualan);

    $data = [
      'kota' => $kota,
      'hasil' => $hasil,
      'motor' => $motor,
      'leasing' => $leasing,
      'sales' => $sales,
      'colors' => $colors,
      'tenors' => $tenorOptions,
      'judulHalaman' => "edit data penjualan",
      'penjualan' => $penjualan,
    ];

    return view('admin.penjualan.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */


  public function formatNomorTelepon($nomor)
  {
    // Hapus karakter selain angka
    $nomor = preg_replace('/[^0-9]/', '', $nomor);

    // Cek apakah nomor dimulai dengan '08'
    if (substr($nomor, 0, 2) == '08') {
      // Ganti '08' dengan '628'
      $nomor = '628' . substr($nomor, 2);
    }

    return $nomor;
  }



  public function update(Request $request, $id)
  {
    // Validasi input
    // Kondisi untuk validasi dinamis
    $rules = [
      'konsumen' => 'required',
      'metode_pembelian' => 'required',
      'kabupaten' => 'required',
      'hasil' => 'required',
      'motor' => 'required',
      'warna_motor' => 'required',
      'jumlah' => 'required',
      'status_pembayaran' => 'required',
    ];

    // Kondisi untuk menentukan apakah nomor_po required atau tidak


    // dd($request->all());
    $messages = [
      'konsumen.required' => 'nama konsumen tidak boleh kosong !',
      'metode_pembelian.required' => 'metode pembelian tidak boleh kosong !',
      'kabupaten.required' => 'kabupaten tidak boleh kosong !',
      'hasil.required' => 'hasil tidak boleh kosong !',
      'motor.required' => 'motor tidak boleh kosong !',
      'jumlah.required' => 'jumlah tidak boleh kosong !',
      'nomor_po.required' => 'nomor po tidak boleh kosong !',
      'status_pembayaran.required' => 'status pembayaran tidak boleh kosong !',
    ];
    // Kondisi untuk menentukan apakah nomor_po required atau tidak
    if ($request->input('hasil') != 3) {
      $rules['nomor_po'] = 'required';
      $messages['nomor_po.required'] = 'nomor po tidak boleh kosong !';
    }
    if ($request->metode_pembelian === 'cash') {
    } else {
      $rules['dp_asli'] = 'required';
      $messages['dp_asli.required'] = 'dp pengajuan harus dipilih !';
    }
    if (Auth::guard('sales')->check()) {
      $rules['sales'] = 'required';
      $messages['sales.required'] = 'data sales tidak boleh kosong !';
    }

    // Validasi input
    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      $errors = $validator->errors();
      $errorMessage = "Inputkan semua data dengan benar!<br>Kesalahan:<br>" . implode("<br>", $errors->all());

      flash()->addError($errorMessage);
      return redirect()->to(route('admin.penjualan.data.edit', $id))->withInput();
    }


    // Temukan data penjualan
    DB::beginTransaction();
    try {
      $penjualan = Penjualan::findOrFail($id);

      // Update pengajuan akses penjualan jika ada
      $pengajuanAkses = AksesPenjualanModel::where('id_penjualan', $id)->where('status', 'setuju')->first();
      if (!empty($pengajuanAkses)) {
        $pengajuanAkses->status = 'done';
        $pengajuanAkses->save();
      }

      // Kirim notifikasi WhatsApp jika hasil adalah '8'
      if ($request->input('hasil') == 8) {
        try {
          $nomor = $this->formatNomorTelepon($penjualan->no_hp);
          $message = "Halo " . ucwords(strtolower($penjualan->nama_konsumen)) . ",\n\n" .
            "Kami ingin mengonfirmasi pembatalan pesanan Anda dengan detail sebagai berikut:\n\n" .
            "Nomor Transaksi: $penjualan->kode_transaksi\n" .
            "Nama Konsumen: " . ucwords(strtolower($penjualan->nama_konsumen)) . "\n" .
            "NIK: $penjualan->nik\n" .
            "Motor: {$penjualan->motor?->nama}\n\n" .
            "Jika Anda setuju dengan pembatalan ini, Anda dapat mengabaikan pesan ini.\n" .
            "Jika Anda tidak merasa melakukan pembatalan ini atau ada kesalahan, mohon balas dengan 'TIDAK' atau hubungi layanan pelanggan kami untuk klarifikasi lebih lanjut.\n\n" .
            "Terima kasih atas perhatian Anda.";

          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
              'target' => $nomor,
              'message' => $message,
              'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
              'Authorization: P-9!+K5R7WAVcKBygaKY'
            ),
          ));
          $response = curl_exec($curl);
          curl_close($curl);
        } catch (\Throwable $th) {
          Log::info('Notifikasi Wa FAIL', ['error' => $th]);
        }
      }

      // Parsing tanggal_hasil
      $tanggal_hasil = $request->input('tanggal_hasil') ? \Carbon\Carbon::createFromFormat('m/d/Y', $request->input('tanggal_hasil'))->format('Y-m-d') : null;

      // Logika Pembelian
      $pembelian = $request->input('metode_pembelian');
      $warna_motor = $request->input('warna_motor') ?? null;
      $tenor = $pembelian === 'cash' ? 0 : $request->tenor;
      $catatan = $request->catatan ?? '-';
      $nomorPo = $request->nomor_po ?? null;

      $motor = Motor::with(['cicilanMotor' => function ($motor) use ($request) {
        $motor->where('id_motor', $request->motor)
          ->where('id_leasing', $request->leasing)
          ->where('tenor', $request->tenor)
          ->first();
      }, 'diskonMotor' => function ($diskon) use ($request) {
        $diskon->where('id_leasing', $request->leasing)
          ->where('tenor', $request->tenor)
          ->first();
      }])->find($request->motor);

      if ($pembelian === 'cash') {
        if ($request->tj < $motor->minimal_dp) {
          flash()->addError("Tanda Jadi minimal untuk motor {$motor->nama} adalah {$motor->minimal_dp} !");
          return redirect()->back()->withInput();
        }
      } else {
        if ($request->dp < $motor->minimal_dp) {
          flash()->addError("DP minimal untuk motor {$motor->nama} adalah {$motor->minimal_dp} !");
          return redirect()->back()->withInput();
        }
      }

      // Update penjualan
      $penjualan->update([
        'nama_konsumen' => $request->input('konsumen'),
        'tenor' => $tenor,
        'metode_pembelian' => $pembelian,
        'metode_pembayaran' => $request->input('metode_pembayaran'),
        'id_sales' => $request->input('sales'),
        'jumlah' => $request->input('jumlah'),
        'catatan' => $catatan,
        'tanggal_hasil' => $tanggal_hasil,
        'dp_asli' => $request->dp_asli,
        'angsuran' => $request->angsuran,
        'status_pembayaran_dp' => $request->input('status_pembayaran'),
        'dp' => $pembelian === 'cash' ? $request->tj : $request->dp,
        'diskon_dp' => $motor->diskonMotor[0]->diskon_promo ?? 0,
        'id_lising' => $pembelian === 'cash' ? null : $request->leasing,
        'id_motor' => $request->input('motor'),
        'id_kota' => $request->input('kabupaten'),
        'id_hasil' => $request->input('hasil'),
        'no_po' => $nomorPo,
        'bpkb' => $request->bpkb ?? null,
        'no_hp' => $request->no_hp ?? null,
        'id_color' => $warna_motor,
        'is_edit' => 0,
      ]);

      // Update atau buat detail pembayaran
      $detailPembayaran = DetailPembayaranModel::where('id_penjualan', $penjualan->id)->first();
      if (!$detailPembayaran) {
        $detailPembayaran = new DetailPembayaranModel();
        $detailPembayaran->id_penjualan = $penjualan->id;
      }

      if ($request->input('hasil') == 4) {
        $sudahBayar = Pembayaran::where('id_detail_pembayaran', $detailPembayaran->id)
          ->where('status_pembayaran', 'success')
          ->first();
        if (!$sudahBayar) {
          flash()->addError("Konsumen ini belum bayar tanda jadi, Tidak bisa DO !");
          return redirect()->back()->withInput();
        }
      }
      // Lanjutkan dengan kode berikutnya di sini

      if ($pembelian === 'cash') {
        $isLunas = ($motor->harga - $request->diskon_dp) == $request->tj;
        $detailPembayaran->jumlah_bayar = $request->input('tj');
        $detailPembayaran->sisa_bayar = ($motor->harga - $request->input('diskon_dp') ?? 0) - $request->input('tj');
        $detailPembayaran->total_lunas = $motor->harga - $request->input('diskon_dp') ?? 0;
      } else {
        $cicilan = CicilanMotor::where('id_motor', $request->input('motor'))
          ->where('id_lokasi', $request->input('kabupaten'))
          ->where('id_leasing', $request->input('leasing'))
          ->where('tenor', $request->input('tenor'))->first();

        if (empty($cicilan)) {
          flash()->addError("Data cicilan tidak ditemukan !");
          return redirect()->back()->withInput();
        }

        $isLunas = $cicilan->dp == $request->input('dp');
        $detailPembayaran->jumlah_bayar = $request->input('dp');
        $detailPembayaran->sisa_bayar = ($request->dp_asli - $motor->diskonMotor[0]->diskon_promo ?? 0) - $request->input('dp');
        $detailPembayaran->total_lunas = $request->dp_asli - $motor->diskonMotor[0]->diskon_promo ?? 0;
        Log::channel('penjualan')->info("DEBUG DATA PENJUALAN ", ['dp_asli' => $request->dp_asli, 'diskon_promo' => $motor->diskonMotor[0]->diskon_promo]);
      }

      $detailPembayaran->status = $isLunas ? 'pelunasan' : 'tanda';
      $detailPembayaran->save();

      DB::commit();
      // Redirect back with success message
      flash()->addSuccess("Berhasil merubah data!");
      try {
        $hasil_id = $request->input('hasil');
        $getHasilName =  Hasil::find($hasil_id);
        return redirect()->to(route("admin.penjualan." . strtolower($getHasilName->hasil) . ".index"));
      } catch (\Throwable $th) {
        return redirect()->back();
      }
    } catch (\Throwable $th) {
      //throw $th;
      Log::info(['ERROR UPDATE DATA PENJUALAN : ' => $th]);
      DB::rollback();

      flash()->addError("Terjadi kesalahan padar server !");
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
      $penjualan = Penjualan::findOrFail($id);
      $penjualan->delete();
      flash()->addSuccess("Berhasil menghapus data!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }

  public function tambahPelunasan(Request $request, $id_penjualan)
  {
    $validator = Validator::make($request->all(), [
      'dp' => 'required', // Pastikan input 'dp' ada dan valid
      'id_detail_pembayaran' => 'required',
      'email' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json(['pesan' => 'Inputkan semua data dengan benar!'], 400);
    }

    $idPenjualan = intval($id_penjualan);
    $idDetailPembayaran = intval($request->input('id_detail_pembayaran'));

    DB::beginTransaction();
    try {
      // Ambil detail pembayaran terakhir untuk penjualan ini
      $lastDetailPembayaran = DetailPembayaranModel::where('id_penjualan', $idPenjualan)
        ->orderBy('periode', 'desc')
        ->first();
      if (!$lastDetailPembayaran) {
        return response()->json(['pesan' => 'Data pembayaran sebelumnya tidak ditemukan'], 404);
      }

      // Ambil data penjualan terkait
      $penjualan = $lastDetailPembayaran->penjualan;
      $namaKonsumen = $penjualan->nama_konsumen;
      // validasi input pembayaran tidak melebihi sisa pembayaran seharusnya 
      $cekKelebihan = (int) $request->dp > (int) $lastDetailPembayaran->sisa_bayar;
      // return response()->json($lastDetailPembayaran->sisa_bayar);
      if ($cekKelebihan) {
        return response()->json(['pesan' => 'Input tidak boleh melebihi tagihan konsumen.' . $cekKelebihan], 400);
      }

      // Hitung sisa bayar setelah pembayaran ini
      $sisaBayar = $lastDetailPembayaran->sisa_bayar - $request->dp;

      // Tentukan status pembayaran
      $status = ($sisaBayar == 0) ? 'pelunasan' : 'tanda';

      $konteks = $status == 'pelunasan' ? 'Pelunasan' : "Pembayaran tanda jadi tahap-" . $lastDetailPembayaran->periode + 1;

      // Ambil kode transaksi dari penjualan
      $kodeTransaksi = $penjualan->kode_transaksi;

      // Generate kode bayar baru sesuai aturan
      $bulanSekarang = date('m');
      $tahunSekarang = date('Y');
      $lastDetail = DetailPembayaranModel::where('kode_bayar', 'like', "$kodeTransaksi%")
        ->whereMonth('created_at', $bulanSekarang)
        ->whereYear('created_at', $tahunSekarang)
        ->orderBy('created_at', 'desc')
        ->first();
      $urutan = $lastDetail ? ((int) substr(
        $lastDetail->kode_bayar,
        strrpos($lastDetail->kode_bayar, '-') + 1
      )) + 1 : 1;
      $kodeBayarBaru = "$kodeTransaksi-$urutan";


      // Buat detail pembayaran baru
      $detailPembayaran = DetailPembayaranModel::create([
        'id_penjualan' => $idPenjualan,
        'kode_bayar' => $kodeBayarBaru, // Gunakan kode bayar baru
        'jumlah_bayar' => $request->dp,
        'sisa_bayar' => $sisaBayar,
        'total_lunas' => $lastDetailPembayaran->total_lunas, // Total lunas tetap sama
        'periode' => $lastDetailPembayaran->periode + 1,
        'status' => $status
      ]);

      // Buat pembayaran baru
      $pembayaran = Pembayaran::create([
        'id_detail_pembayaran' => $detailPembayaran->id,
        'harga' => $request->dp,
        'order_id' => $kodeBayarBaru
      ]);

      // ... (Konfigurasi Midtrans, pembuatan transaksi, dll. - sama seperti di method bayar())
      // Konfigurasi Midtrans
      \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
      \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
      \Midtrans\Config::$isSanitized = true;
      \Midtrans\Config::$is3ds = false;


      $transactionDetails = [
        'order_id' => $kodeBayarBaru,
        'gross_amount' => $pembayaran->harga,
      ];
      $customerDetails = [
        'first_name' => $namaKonsumen,
        'email' => $request->input('email'),
      ];

      $productDetails = [
        [
          'id' => $idPenjualan,
          'quantity' => 1,
          'price' => $pembayaran->harga,
          'name' => $konteks . ' motor ' . $request->input('motor'),
        ],
      ];

      // Membuat transaksi ke Midtrans
      $transaction = [
        'transaction_details' => $transactionDetails,
        'item_details' => $productDetails,
        'customer_details' => $customerDetails,
      ];

      $snapToken = \Midtrans\Snap::getSnapToken($transaction);
      $snapUrl = \Midtrans\Snap::createTransaction($transaction)->redirect_url;
      DB::commit();
      // ... (Kembalikan respons - sama seperti di method bayar())
      return response()->json(['redirect_url' => $snapUrl]);
    } catch (\Exception $e) {
      DB::rollback();
      return response()->json(['pesan' => 'Error coba beberapa saat lagi' . $e->getMessage()], 500);
    }
  }




  public function pelunasanOffline(Request $request, $id_penjualan)
  {
    // dd($request->all(), $id_penjualan);




    // pengecekan pelunasan sebelumnya
    $cekDetailPembayaran = DetailPembayaranModel::where('id_penjualan', $id_penjualan)->where('status', 'pelunasan')->get()->count();
    if ($cekDetailPembayaran > 0) {
      flash()->addError("Data ini sudah dinyatakan lunas !");
      return redirect()->back();
    }

    try {
      DB::transaction(function () use ($request, $id_penjualan) {
        $lastDetailPembayaran = DetailPembayaranModel::where('id_penjualan', $id_penjualan)
          ->orderBy('periode', 'desc')
          ->first();
        if (!$lastDetailPembayaran) {
          flash()->addError("Data pembayaran sebelumnya tidak ditemukan");
          throw new \Exception("Data pembayaran sebelumnya tidak ditemukan");
        }

        // Ambil data penjualan terkait
        $penjualan = $lastDetailPembayaran->penjualan;
        $namaKonsumen = $penjualan->nama_konsumen;

        // pengecekan harus DO
        if ($penjualan->id_hasil != 4) {
          flash()->addError("Pelunasan hanya bisa di lakukan untuk data yang sudah DO. !");
          return redirect()->back();
        }

        // Set jumlah bayar menjadi sisa bayar terakhir
        $jumlahBayar = $lastDetailPembayaran->sisa_bayar;
        $sisaBayar = 0; // Karena pelunasan
        $status = 'pelunasan';
        $konteks = 'Pelunasan';

        // Ambil kode transaksi dari penjualan
        $kodeTransaksi = $penjualan->kode_transaksi;

        // Generate kode bayar baru sesuai aturan
        $bulanSekarang = date('m');
        $tahunSekarang = date('Y');
        $lastDetail = DetailPembayaranModel::where('kode_bayar', 'like', "$kodeTransaksi%")
          ->whereMonth('created_at', $bulanSekarang)
          ->whereYear('created_at', $tahunSekarang)
          ->orderBy('created_at', 'desc')
          ->first();
        $urutan = $lastDetail ? ((int) substr(
          $lastDetail->kode_bayar,
          strrpos($lastDetail->kode_bayar, '-') + 1
        )) + 1 : 1;
        $kodeBayarBaru = "$kodeTransaksi-$urutan";

        // Buat detail pembayaran baru
        $detailPembayaran = DetailPembayaranModel::create([
          'id_penjualan' => $id_penjualan,
          'kode_bayar' => $kodeBayarBaru,
          'jumlah_bayar' => $jumlahBayar,
          'sisa_bayar' => $sisaBayar,
          'total_lunas' => $lastDetailPembayaran->total_lunas,
          'periode' => $lastDetailPembayaran->periode + 1,
          'status' => $status
        ]);

        // Buat pembayaran baru
        $pembayaran = Pembayaran::create([
          'id_detail_pembayaran' => $detailPembayaran->id,
          'order_id' => $kodeBayarBaru,
          'harga' => $jumlahBayar,
          'status_pembayaran' => 'success',
          'metode_pembayaran' => 'offline',
          'paid_at' => Carbon::now(),
        ]);

        flash()->addSuccess("Berhasil melakukan pelunasan untuk data konsumen $namaKonsumen!");
      });

      return redirect()->back();
    } catch (\Throwable $th) {
      // Menangani error
      Log::channel('penjualan')->info('Error pelunasan : ', [$th->getMessage()]);
      flash()->addError("Terjadi kesalahan: " . $th->getMessage());
      return redirect()->back();
    }
  }





  public function bayar(Request $request, $id_penjualan)
  {


    $validator = Validator::make($request->all(), [
      'kode_bayar' => 'required',
      'konsumen' => 'required',
      'email' => 'required',
      'sales' => 'required',
      'dp' => 'required',
      'id_detail_pembayaran' => 'required',
    ]);
    // tangkap req
    $kode_bayar = intval($request->input('kode_bayar'));
    $idSales = intval($request->input('sales'));
    $idPenjualan = intval($id_penjualan);
    $idDetailPembayaran = intval($request->input('id_detail_pembayaran'));
    $namaKonsumen = $request->input('konsumen');
    // validator
    if ($validator->fails()) {
      return response()->json(['pesan' => 'Inputkan semua data dengan benar!'], 400);
    }

    // dd($request->all());
    DB::beginTransaction();
    try {
      $penjualan = Penjualan::where('id', $idPenjualan)
        ->where(function ($query) use ($namaKonsumen) {
          $query->whereRaw('LOWER(nama_konsumen) = ?', [strtolower($namaKonsumen)]);
        })
        ->where('id_sales', $idSales)
        ->first();

      if (!$penjualan) {
        return response()->json(['pesan' => 'data penjualan tidak ditemukan'], 404);
      }


      $getDetailPembayaran = DetailPembayaranModel::where('id_penjualan', $idPenjualan)->first();

      // Menggunakan metode create untuk membuat pembayaran baru
      $pembayaran = Pembayaran::create([
        'id_detail_pembayaran' => $getDetailPembayaran->id,
        'harga' => $request->dp,
        'order_id' => $getDetailPembayaran->kode_bayar
      ]);

      // return response()->json($pembayaran->toSql());


      // Konfigurasi Midtrans
      \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
      \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
      \Midtrans\Config::$isSanitized = true;
      \Midtrans\Config::$is3ds = false;
      // Create a unique order_id by appending a timestamp or a unique string to id_penjualan
      $uniqueOrderId = intval($request->input('kode_bayar'));
      // $uniqueOrderId = $pembayaran->id_penjualan . '-' . time();
      $transactionDetails = [
        'order_id' => $getDetailPembayaran->kode_bayar,
        'gross_amount' => $pembayaran->harga,
      ];
      $customerDetails = [
        'first_name' => $namaKonsumen,
        'email' => $request->input('email'),
      ];

      $productDetails = [
        [
          'id' => $idPenjualan,
          'quantity' => 1,
          'price' => $pembayaran->harga,
          'name' => 'Pembayaran DP Motor ' . $request->input('motor'),
        ],
      ];

      // Membuat transaksi ke Midtrans
      $transaction = [
        'transaction_details' => $transactionDetails,
        'item_details' => $productDetails,
        'customer_details' => $customerDetails,
      ];

      $snapToken = \Midtrans\Snap::getSnapToken($transaction);
      $snapUrl = \Midtrans\Snap::createTransaction($transaction)->redirect_url;
      DB::commit();

      // return redirect()->away($snapUrl);
      return response()->json(['redirect_url' => $snapUrl]);
      // return response()->json(['snap_token' => $snapToken]);
    } catch (\Exception $e) {
      DB::rollback();
      return response()->json(['pesan' => 'Error coba beberapa saat lagi' . $e->getMessage()], 500);
    }
  }

  public function getPaymentData($id)
  {
    $penjualan = Penjualan::with('sales', 'motor')->findOrFail($id);
    $penjualan->load(['detailPembayaran' => function ($query) use ($id) {
      $query->where('id_penjualan', $id)->orderByDesc('periode')->first();
    }]);

    // Tambahkan logika untuk mengambil data tambahan jika diperlukan
    return response()->json($penjualan);
  }

  public function getPrintData($id)
  {
    $penjualan = Penjualan::with(['kota', 'motor'])->findOrFail($id);
    return response()->json($penjualan);
  }


  public function getDetailPembayaran($id)
  {
    try {
      $sale = DetailPembayaranModel::with(['pembayaran'])->where('id_penjualan', $id)->get();
      return response()->json([
        'status' => 'success',
        'data'   => $sale
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'status' => 'error',
        'message' => $e->getMessage()
      ], 404);
    }
  }



  public function getDataRefund($id)
  {
    try {
      $refund = DetailPembayaranModel::with(['penjualan' => function ($q) {
        $q->with('motor');
      }])->find($id);
      return response()->json([
        'status' => 'success',
        'data'   => $refund
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'status' => 'error',
        'message' => $e->getMessage()
      ], 404);
    }
  }





  public function getDataPenjualan($id)
  {
    try {
      $sale = Penjualan::with(['sales', 'kota', 'hasil', 'motor', 'leasing'])->findOrFail($id);
      return response()->json([
        'status' => 'success',
        'data'   => $sale
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'status' => 'error',
        'message' => $e->getMessage()
      ], 404);
    }
  }

  // tambahan meethod import csv
  public function importCsv(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'file' => 'required|file',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $skippedRows = []; // Array untuk menyimpan informasi baris yang dilewati
    $rowNumber = 1; // Untuk menghitung nomor baris, dimulai dari 1 setelah header

    if (($handle = fopen($request->file('file')->getRealPath(), 'r')) !== false) {
      fgetcsv($handle); // Melewati header

      while (($data = fgetcsv($handle, 1000, ',')) !== false) {
        $rowNumber++; // Increment row number for each row

        // Cek duplikasi nik di database
        $existingNik = DB::table('penjualan')->where('nik', $data[19])->exists();

        if (!$existingNik) {
          DB::table('penjualan')->insert([
            'nama_konsumen' => $data[0],
            'jumlah' => $data[1],
            'catatan' => $data[2],
            'tenor' => $data[3],
            'metode_pembelian' => $data[4],
            'metode_pembayaran' => $data[5],
            'warna_motor' => $data[6],
            'no_hp' => $data[7],
            'bpkb' => $data[8],
            'dp' => $data[9],
            'diskon_dp' => $data[10],
            'status_pembayaran_dp' => $data[11],
            'tanggal_dibuat' => $data[12],
            'no_po' => $data[13],
            'id_sales' => $data[14],
            'id_kota' => $data[15],
            'id_hasil' => $data[16],
            'id_motor' => $data[17],
            'id_lising' => $data[18],
            'nik' => $data[19],
            'tgl_lahir' => $data[20],
          ]);
        } else {
          // Jika nik sudah ada, simpan nomor baris ke array $skippedRows
          $skippedRows[] = $rowNumber;
        }
      }
      fclose($handle);
    }

    // Cek apakah ada baris yang dilewati
    if (!empty($skippedRows)) {
      $skippedRowsString = implode(', ', $skippedRows);
      flash()->addWarning("Baris yang dilewati karena nik duplikat: " . $skippedRowsString);
    } else {
      flash()->addSuccess("Data csv berhasil diimport");
    }

    return redirect()->back();
  }

  public function fixing()
  {
    $penjualans = Penjualan::all();
    foreach ($penjualans as $penjualan) {
      $bulan = date('m', strtotime($penjualan->created_at));
      $tahun = date('y', strtotime($penjualan->created_at));
      $tanggal = date('d', strtotime($penjualan->created_at));

      $kode_transaksi = "BM-$bulan-$tahun-$tanggal-" . $penjualan->id;
      $penjualan->kode_transaksi = $kode_transaksi;
      $penjualan->save();
    }
    return "selesai";
  }

  // hanya untuk testing debug 
  public function testing($id)
  {
    // Generate kode bayar baru sesuai aturan
    // $bulanSekarang = date('m');
    // $tahunSekarang = date('Y');
    // $lastDetail = DetailPembayaranModel::where('kode_bayar', 'like', "$id%")
    //   ->whereMonth('created_at', $bulanSekarang)
    //   ->whereYear('created_at', $tahunSekarang)
    //   ->orderBy('created_at', 'desc')
    //   ->first();
    // $urutan = $lastDetail ? ((int) substr($lastDetail->kode_bayar, strrpos($lastDetail->kode_bayar, '-') + 1)) + 1 : 1;
    // $kodeBayarBaru = "$id-$urutan";




    // // dd($data->toSql());
    // return response()->json($kodeBayarBaru);



    $existingRecord = CicilanMotor::where('id_motor', 3)
      ->where('id_lokasi', 1)
      ->where('id_leasing', 1)
      ->where('tenor', 11);

    dd($existingRecord->toSql());
  }
}
