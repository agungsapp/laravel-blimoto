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

class AdminPenjualanDoConntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hasil = Hasil::where('hasil', 'do')->first();
        $data = Penjualan::with('motor', 'leasing', 'hasil', 'kota', 'sales')
            ->where('id_hasil', $hasil->id)
            ->orderBy('id', 'desc')
            ->get();

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
