<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kota;
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
}
