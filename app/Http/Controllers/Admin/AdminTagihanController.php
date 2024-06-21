<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CicilanMotor;
use App\Models\Hasil;
use App\Models\Kota;
use App\Models\Motor;
use App\Models\Penjualan;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnCallback;

class AdminTagihanController extends Controller
{
    public function sudahBayar()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = Penjualan::where('metode_pembelian', 'kredit')
            ->whereHas('detailPembayaran', function ($query) {
                $query->where('status', '!=', 'pelunasan');
            })
            ->with([
                'motor',
                'detailPembayaran'
            ])
            ->withSum('detailPembayaran', 'jumlah_bayar')
            ->get();

        foreach ($penjualan as $p) {
            $p->cicilan = $p->cicilan_yang_sesuai;
            $p->diskon_motor = $p->diskon_motor_yang_sesuai;
            // $p->tanggal = $p->detail_pembayaran->created_at;
            // Memeriksa apakah ada detail pembayaran
            $p->tanggal_bayar = $p->detailPembayaran->first()->created_at;
        }



        // return response()->json($penjualan);

        $data = [
            'sales' => Sales::all(),
            'kota' => Kota::all(),
            'hasil' => Hasil::all(),
            'motor' => Motor::all(),
            'penjualan' => $penjualan // Tambahkan data penjualan yang sudah difilter
        ];

        return view('admin.laporan_tagihan.belum_bayar.index', $data);
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
