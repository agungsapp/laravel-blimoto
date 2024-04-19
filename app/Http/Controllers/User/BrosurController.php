<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DetailMotor;
use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BrosurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $motors = Motor::getMotorsWithBrosur($search);

        $data = [
            'populer' => $this->getMotorData(6),
            'motors' => $motors,
            'pencarian' => $search
        ];
        // dd($data['motors'][0]->motorKota[0]->harga_otr);
        // dd($data['populer'][0]->motorKota[0]->harga_otr);

        return view('user.brosur.index', $data);
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

    private function getMotorData($bestMotorId)
    {
        $kotaId = Session::get('lokasiUser');
        // Set default value of $kotaId to 1 if it's empty
        if (empty($kotaId)) {
            $kotaId = 1;
        }
        // dd($kotaId);
        $motors = Motor::with(['diskonMotor', 'brosurMotor', 'motorKota' => function ($query) use ($kotaId) {
            $query->where('id_kota', $kotaId);
        }])
            ->whereHas('mtrBestMotor', function ($query) use ($bestMotorId) {
                $query->where('id_best_motor', $bestMotorId);
            })
            ->whereHas('motorKota', function ($query) use ($kotaId) {
                $query->whereColumn('motor_kota.id_motor', 'motor.id'); // Menyesuaikan kondisi relasi
            })
            ->get();

        foreach ($motors as $motor) {
            $motor->image = DetailMotor::where('id_motor', $motor->id)
                ->pluck('gambar')->first();

            // Lakukan null check sebelum mengakses properti 'nama_file'
            $motor->brosur = $motor->brosurMotor ? $motor->brosurMotor->nama_file : null;
        }

        // dd($motors);

        return $motors;
    }
}
