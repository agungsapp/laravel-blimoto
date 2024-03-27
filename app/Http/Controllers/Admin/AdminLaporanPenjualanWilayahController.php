<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use App\Models\Penjualan;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class AdminLaporanPenjualanWilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idWilayah = $request->wilayah ?? 1; // Default ke 1 jika tidak ada input
        $tanggalMulai = $request->tanggal_mulai ? Carbon::parse($request->tanggal_mulai) : null;
        $tanggalSelesai = $request->tanggal_selesai ? Carbon::parse($request->tanggal_selesai) : null;

        $query = Penjualan::query();

        // Filter berdasarkan wilayah jika ada
        if ($idWilayah) {
            $query->where('id_kota', $idWilayah);
        }

        // Filter berdasarkan range tanggal jika ada
        if ($tanggalMulai && $tanggalSelesai) {
            $query->whereBetween('tanggal_dibuat', [$tanggalMulai, $tanggalSelesai]);
        } else {
            // Jika hanya ada salah satu dari tanggal mulai atau tanggal selesai
            if ($tanggalMulai) {
                $query->where('tanggal_dibuat', '>=', $tanggalMulai);
            }
            if ($tanggalSelesai) {
                $query->where('tanggal_dibuat', '<=', $tanggalSelesai);
            }
        }

        $query->whereIn('status_pembayaran_dp', ['success', 'cod'])
            ->with(['motor', 'kota']);

        $penjualan = $query->get();

        $data = [
            'laporans' => $penjualan, // Langsung kirim hasil query ke view
            'kotas' => Kota::all()
        ];

        // dd($data);

        return view('admin.penjualan_wilayah.index', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mengambil data penjualan berdasarkan id_kota dengan status pembayaran DP 'success' atau 'cod',
        // serta memuat informasi tentang motor yang terkait dengan penjualan tersebut.
        $penjualanMotor = Penjualan::where('id_kota', $id)
            ->whereIn('status_pembayaran_dp', ['success', 'cod'])
            ->with(['motor' => function ($query) {
                $query->select('id', 'nama'); // Misalnya, asumsikan tabel motor memiliki kolom 'id' dan 'nama'
            }])
            ->get(['id_motor', 'tanggal_dibuat']); // Hanya mengambil kolom yang dibutuhkan

        $namaKota = Kota::where('id', $id)->first()->nama;

        // Mengirim data ke view, termasuk nama kota dan penjualan motor
        return view('admin.penjualan_wilayah.show', [
            'penjualanMotor' => $penjualanMotor,
            'namaKota' => $namaKota,
        ]);
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


    // cetak laporan
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function cetakLaporan(Request $request)
    {
        // dd("test");
        // Aturan validasi
        $rules = [
            'wilayah' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ];

        // Pesan kesalahan kustom untuk validasi
        $messages = [
            'wilayah.required' => 'Wilayah harus dipilih.',
            'tanggal_mulai.required' => 'Tanggal mulai harus diisi.',
            'tanggal_selesai.required' => 'Tanggal selesai harus diisi.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus sama atau setelah tanggal mulai.',
        ];

        // Membuat validasi
        $validator = Validator::make($request->all(), $rules, $messages);

        // Cek apakah validasi gagal
        if ($validator->fails()) {
            // Kembali ke halaman sebelumnya dengan pesan error validasi
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, lanjutkan proses pembuatan laporan
        $idWilayah = $request->wilayah;

        $kota = Kota::find($idWilayah);

        $tanggalMulai = Carbon::parse($request->tanggal_mulai);
        $tanggalSelesai = Carbon::parse($request->tanggal_selesai);

        $penjualan = Penjualan::where('id_kota', $idWilayah)
            ->whereBetween('tanggal_dibuat', [$tanggalMulai, $tanggalSelesai])
            ->whereIn('status_pembayaran_dp', ['success', 'cod'])
            ->with(['motor', 'kota'])
            ->get();

        // Buat view PDF dengan data yang telah difilter
        $pdf = Pdf::loadView('admin.penjualan_wilayah.cetak', [
            'penjualans' => $penjualan,
            'kota' =>  $kota->nama,
            'tanggal_m' => $request->tanggal_mulai,
            'tanggal_s' => $request->tanggal_selesai,


        ]);
        // Tampilkan PDF di browser
        return $pdf->stream('laporan_penjualan.pdf');
    }
    public function cetakLaporanDom(Request $request)
    {
        // dd("test");
        // Aturan validasi
        $rules = [
            'wilayah' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ];

        // Pesan kesalahan kustom untuk validasi
        $messages = [
            'wilayah.required' => 'Wilayah harus dipilih.',
            'tanggal_mulai.required' => 'Tanggal mulai harus diisi.',
            'tanggal_selesai.required' => 'Tanggal selesai harus diisi.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus sama atau setelah tanggal mulai.',
        ];

        // Membuat validasi
        $validator = Validator::make($request->all(), $rules, $messages);

        // Cek apakah validasi gagal
        if ($validator->fails()) {
            // Kembali ke halaman sebelumnya dengan pesan error validasi
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, lanjutkan proses pembuatan laporan
        $idWilayah = $request->wilayah;

        $kota = Kota::find($idWilayah);

        $tanggalMulai = Carbon::parse($request->tanggal_mulai);
        $tanggalSelesai = Carbon::parse($request->tanggal_selesai);

        $penjualan = Penjualan::where('id_kota', $idWilayah)
            ->whereBetween('tanggal_dibuat', [$tanggalMulai, $tanggalSelesai])
            ->whereIn('status_pembayaran_dp', ['success', 'cod'])
            ->with(['motor', 'kota'])
            ->get();

        // Buat view PDF dengan data yang telah difilter
        $pdf = Pdf::loadView('admin.penjualan_wilayah.cetak', [
            'penjualans' => $penjualan,
            'kota' =>  $kota->nama,
            'tanggal_m' => $request->tanggal_mulai,
            'tanggal_s' => $request->tanggal_selesai,


        ]);
        // Tampilkan PDF di browser
        return $pdf->stream('laporan_penjualan.pdf');
    }
    public function cetakLaporanDemo(Request $request)
    {
        // dd("test");
        // Aturan validasi
        $rules = [
            'wilayah' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ];

        // Pesan kesalahan kustom untuk validasi
        $messages = [
            'wilayah.required' => 'Wilayah harus dipilih.',
            'tanggal_mulai.required' => 'Tanggal mulai harus diisi.',
            'tanggal_selesai.required' => 'Tanggal selesai harus diisi.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus sama atau setelah tanggal mulai.',
        ];

        // Membuat validasi
        $validator = Validator::make($request->all(), $rules, $messages);

        // Cek apakah validasi gagal
        if ($validator->fails()) {
            // Kembali ke halaman sebelumnya dengan pesan error validasi
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, lanjutkan proses pembuatan laporan
        $idWilayah = $request->wilayah;

        $kota = Kota::find($idWilayah);

        $tanggalMulai = Carbon::parse($request->tanggal_mulai);
        $tanggalSelesai = Carbon::parse($request->tanggal_selesai);

        $penjualan = Penjualan::where('id_kota', $idWilayah)
            ->whereBetween('tanggal_dibuat', [$tanggalMulai, $tanggalSelesai])
            ->whereIn('status_pembayaran_dp', ['success', 'cod'])
            ->with(['motor', 'kota'])
            ->get();

        // Buat view PDF dengan data yang telah difilter
        $pdf = Pdf::loadView('admin.penjualan_wilayah.cetak', [
            'penjualans' => $penjualan,
            'kota' =>  $kota->nama,
            'tanggal_m' => $request->tanggal_mulai,
            'tanggal_s' => $request->tanggal_selesai,


        ]);
        // Tampilkan PDF di browser
        return $pdf->stream('laporan_penjualan.pdf');
    }

    public function testCetak()
    {
        return view('admin.penjualan_wilayah.cetak');
    }
}
