<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\PengajuanRefundModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminApiRefundController extends Controller
{
    public function pengajuanRefund(Request $request, $id)
    {
        // Membuat rules validasi
        $rules = [
            'idr' => 'required',
            'konsumen' => 'required',
            'dp' => 'required|numeric',
            'metode_pembayaran' => 'required',
            'motor' => 'required',
        ];

        // Melakukan validasi
        $validator = Validator::make($request->all(), $rules);

        // Cek jika validasi gagal
        if ($validator->fails()) {
            // Mengembalikan response JSON dengan pesan error dan kode status 422
            return response()->json(['errors' => $validator->errors()], 422);
        }


        try {
            PengajuanRefundModel::create([
                'id_penjualan' => $request->idr,
                'nominal' => $request->dp,
                'status_pengajuan' => 'waiting', // waiting, acc, proses, completed
                'catatan' => $request->catatan
            ]);


            return response()->json(['message' => 'Pengajuan refund sedang menunggu di acc oleh CEO ! '], 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => 'Gagal terjadi kesalahan pada server'], 500);
        }
    }
}
