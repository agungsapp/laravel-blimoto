<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CicilanMotor;
use App\Models\Motor;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BandingkanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.bandingkan.index');
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

    public function getSingleMotor($id)
    {
        $motor = Motor::with('detailMotor', 'merk', 'type')->find($id);
        $diskonMotor = $this->getDiskonMotor($id);
        return response()->json([
            'data' => $motor,
            'diskon_motor' => $diskonMotor
        ]);
    }

    public function getMotor(Request $request)
    {
        $idMotor1 = $request->input('id_motor1');
        $idMotor2 = $request->input('id_motor2');

        $motor1 = Motor::with('detailMotor', 'merk', 'type', 'cicilanMotor')->find($idMotor1);

        $motor2 = Motor::with('detailMotor', 'merk', 'type', 'cicilanMotor')->find($idMotor2);


        return response()->json([
            'motor1' => $motor1,
            'motor2' => $motor2
        ], 200);
    }

    private function getDiskonMotor($motorId)
    {
        $diskonMotor = CicilanMotor::select(
            DB::raw('MAX(cicilan_motor.dp) as dp'),
            DB::raw('MAX(cicilan_motor.tenor) as tenor'),
            'leasing_motor.gambar',
            'leasing_motor.nama',
            'leasing_motor.diskon_normal',
            'leasing_motor.diskon',
            'leasing_motor.id',
        )
            ->join('leasing_motor', 'cicilan_motor.id_leasing', '=', 'leasing_motor.id')
            ->where('cicilan_motor.id_motor', $motorId)
            ->groupBy('leasing_motor.id', 'leasing_motor.nama', 'leasing_motor.diskon_normal', 'leasing_motor.diskon', 'leasing_motor.gambar')
            ->get();

        foreach ($diskonMotor as $key => $c) {
            $c->diskon_normal = round($c->dp * $c->diskon_normal);
            $c->diskon = round($c->dp * $c->diskon);
        }

        return $diskonMotor;
    }
}
