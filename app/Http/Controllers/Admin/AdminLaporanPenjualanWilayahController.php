<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
}
