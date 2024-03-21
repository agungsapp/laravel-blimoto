<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class AdminLaporanPenjualanWilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $laporanPenjualanPerKota = Kota::with(['penjualan' => function ($query) {
            $query->select('id_kota', 'tanggal_dibuat', 'id_motor', 'status_pembayaran_dp')
                ->whereIn('status_pembayaran_dp', ['success', 'cod'])
                ->with(['motor']);
        }])->get();
        $dataLaporan = $laporanPenjualanPerKota->map(function ($kota) {
            $jumlahPenjualan = $kota->penjualan->count();
            $detailPenjualan = $kota->penjualan->map(function ($penjualan) {
                return [
                    'tanggal_dibuat' => $penjualan->tanggal_dibuat,
                    'unit' => $penjualan->motor ? $penjualan->motor->nama : 'Tidak tersedia',
                ];
            });
            return [
                'id_kota' => $kota->id,
                'nama_kota' => $kota->nama,
                'jumlah_penjualan' => $jumlahPenjualan,
                'detail_penjualan' => $detailPenjualan,
            ];
        });


        // ========================== NO FILTER =================================================
        // $laporanPenjualanPerKota = Kota::with(['penjualan' => function ($query) {
        //     $query->select('id_kota', 'tanggal_dibuat', 'id_motor')
        //         ->with('motor');
        // }])->get();
        // $dataLaporan = $laporanPenjualanPerKota->map(function ($kota) {
        //     $jumlahPenjualan = $kota->penjualan->count();
        //     $detailPenjualan = $kota->penjualan->map(function ($penjualan) {
        //         return [
        //             'tanggal_dibuat' => $penjualan->tanggal_dibuat,
        //             'unit' => $penjualan->motor->nama,
        //         ];
        //     });

        //     return [
        //         'nama_kota' => $kota->nama,
        //         'jumlah_penjualan' => $jumlahPenjualan,
        //         'detail_penjualan' => $detailPenjualan,
        //     ];
        // });

        $data = [
            'laporans' => $dataLaporan
        ];

        // dd($dataLaporan);

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
