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


        $cekPengajuanLalu = PengajuanRefundModel::where('id_penjualan', $request->idr)
            ->where('status_pengajuan', 'menunggu')
            ->get();

        if ($cekPengajuanLalu->count() > 0) {
            return response()->json(['error' => 'Pengajuan sebelumnya masih dalam proses mohon menunggu !'], 500);
        }

        try {
            $pengajuan = new PengajuanRefundModel();
            $pengajuan->id_penjualan = $request->idr;
            $pengajuan->nominal = $request->dp;
            $pengajuan->status_pengajuan = 'menunggu';
            $pengajuan->metode_pembayaran = $request->metode_pembayaran;
            if ($request->catatan) {
                $pengajuan->catatan = $request->catatan;
            }
            $pengajuan->save();

            return response()->json(['message' => 'Pengajuan refund sedang menunggu di acc oleh CEO ! '], 201);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Gagal terjadi kesalahan pada server: ' . $th->getMessage()], 500);
        }
    }
}
