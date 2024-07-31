<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use App\Models\WarnaMotorModel;
use Illuminate\Http\Request;

class ApiUtilityController extends Controller
{
    public function getLokasi()
    {
        $kota  = Kota::all();



        return response()->json([
            'message' => 'data kota berhasil di ambil',
            'data' => $kota
        ], 200);
    }

    public function getWarnaMotor(string $id)
    {
        $warnaMotor = WarnaMotorModel::with(['color'])->where('id_motor', $id)->get();

        if ($warnaMotor->count() == 0) {
            return response()->json([
                'message' => 'data motor tidak ditemukan !',
                'data' => $warnaMotor,
                'success' => false,
            ], 400);
        }

        return response()->json([
            'message' => 'berhasil mendapatkan data warna motor',
            'data' => $warnaMotor,
            'success' => true,
        ], 200);
    }
}
