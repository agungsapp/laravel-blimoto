<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class MotorTerbaruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motorData =  Motor::with('merk', 'type', 'detailMotor')
            ->orderBy('motor.updated_at', 'desc')
            ->get();

        // return response()->json($motorData);
        // dd($motorData);
        return view('user.motor_terbaru.index', ['data' => $motorData]);
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

    public function getMotorTinggiRendah(Request $request)
    {
        // $motor = Motor::all();
        $motorTermahal = Motor::with('merk', 'type', 'detailMotor')
            ->orderBy('motor.harga', 'desc')
            ->get();

        // return response()->json($motorTermahal);
        return view('user.motor_terbaru.index', ['data' => $motorTermahal]);
    }

    public function getMotorRendahTinggi()
    {

        $motorTermurah = Motor::with('merk', 'type', 'detailMotor')
            ->orderBy('motor.harga', 'asc')
            ->get();

        // return response()->json($motorTermurah);
        return view('user.motor_terbaru.index', ['data' => $motorTermurah]);
    }

    public function getMotorTerbaru(Request $request)
    {
        $motorData =  Motor::with('merk', 'type', 'detailMotor')
            ->orderBy('motor.updated_at', 'desc')
            ->get();

        // return response()->json($motorData);
        return view('user.motor_terbaru.index', ['data' => $motorData]);
    }
}
