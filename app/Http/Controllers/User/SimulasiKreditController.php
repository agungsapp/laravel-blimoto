<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CicilanMotor;
use App\Models\DetailMotor;
use App\Models\DiskonMotor;
use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SimulasiKreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = [
            'ringan' => $this->getDpTermurah(5),
        ];

        // dd($data['ringan']);

        return view('user.simulasi_kredit.index', $data);
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


    private function getDpTermurah($bestMotorId)
    {
        $kotaId = Session::get('lokasiUser');

        // Set default value of $kotaId to 1 if it's empty
        if (empty($kotaId)) {
            $kotaId = 1;
        }
        // Subquery untuk menemukan tenor maksimal per motor
        $maxTenorSubquery = CicilanMotor::selectRaw('MAX(tenor) as max_tenor, id_motor')
            ->groupBy('id_motor');

        // Query utama untuk mendapatkan motor bersama dengan tenor maksimal dan DP terendah
        $motors = Motor::whereHas('mtrBestMotor', function ($query) use ($bestMotorId) {
            $query->where('id_best_motor', $bestMotorId);
        })
            ->whereHas('motorKota', function ($query) use ($kotaId) {
                $query->where('id_kota', $kotaId);
            })
            ->leftJoinSub($maxTenorSubquery, 'max_tenors', function ($join) {
                $join->on('motor.id', '=', 'max_tenors.id_motor');
            })
            ->leftJoin('cicilan_motor', function ($join) {
                $join->on('motor.id', '=', 'cicilan_motor.id_motor')
                    ->on('cicilan_motor.tenor', '=', 'max_tenors.max_tenor');
            })
            ->select('motor.*', 'cicilan_motor.dp', 'cicilan_motor.cicilan', 'cicilan_motor.tenor', 'cicilan_motor.id_leasing', 'cicilan_motor.id_lokasi')
            ->groupBy('motor.id')
            ->orderBy('cicilan_motor.dp', 'asc')
            ->get();

        // Menambahkan informasi gambar dan diskon ke setiap motor
        foreach ($motors as $motor) {
            // Mengambil gambar motor
            $motor->image = DetailMotor::where('id_motor', $motor->id)
                ->pluck('gambar')->first();

            // Mengambil diskon motor tertinggi
            $maxDiskonPromo = DiskonMotor::where('id_motor', $motor->id)
                ->max('diskon_promo');
            $maxDiskon = DiskonMotor::where('id_motor', $motor->id)
                ->max('diskon');
            $motor->diskon_promo = $maxDiskonPromo;
            $motor->diskon = $maxDiskon;
        }

        return $motors;
    }
}
