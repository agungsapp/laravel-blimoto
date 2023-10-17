<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

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
        return response()->json([
            'data' => $motor
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
}
