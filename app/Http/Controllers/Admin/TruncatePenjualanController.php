<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TruncatePenjualanController extends Controller
{

    protected $kunci = "ya123";

    public function tuncate(string $kunci)
    {
        if ($kunci === $this->kunci) {
            try {
                DB::beginTransaction();
                DB::table('manual_transfer')->truncate();
                DB::table('pengajuan_refund')->truncate();
                DB::table('akses_penjualan')->truncate();
                DB::table('pembayaran')->truncate();
                DB::table('detail_pembayaran')->truncate();
                DB::table('penjualan')->truncate();
                DB::commit();

                return response()->json(['message' => 'berhasil di truncate, penjualan, detail, pembayaran , pengajuan, manual , akses'], 200);
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json(['gagal' => $th->getMessage()], 200);
            }
        }
    }
}
