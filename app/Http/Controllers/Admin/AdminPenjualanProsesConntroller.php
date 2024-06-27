<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\Kota;
use App\Models\LeasingMotor;
use App\Models\Motor;
use App\Models\Penjualan;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPenjualanProsesConntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd(Auth::guard('sales')->check(), Auth::guard('sales')->id());

        $hasil = Hasil::where('hasil', 'proses')->first();
        $data = Penjualan::with('motor', 'leasing', 'hasil', 'kota', 'sales', 'detailPembayaran')
            ->where('id_hasil', $hasil->id);
        if (Auth::guard('sales')->check()) {
            $data->where('id_sales', Auth::guard('sales')->id());
        }
        $data =  $data->orderBy('id', 'desc')
            ->get();
        // dd($data[0]->detailPembayaran);
        $data->map(function ($d) {
            $d->total_lunas = $d->detailPembayaran->isNotEmpty() ? $d->detailPembayaran->first()->total_lunas : 0;
        });



        // return response()->json($data);

        $kota = Kota::all();
        $hasil = Hasil::all();
        $motor = Motor::all();
        $leasing = LeasingMotor::all();
        $sales = Sales::all();

        return view('admin.penjualan.hasil.index', [
            'penjualan' => $data,
            'kota' => $kota,
            'hasil' => $hasil,
            'motor' => $motor,
            'leasing' => $leasing,
            'sales' => $sales,
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
