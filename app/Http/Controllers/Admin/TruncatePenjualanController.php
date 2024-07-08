<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CicilanMotor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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


    public function test(Request $request)
    {
        $distinctData = [];
        $originalData = []; // Menyimpan data asli untuk setiap key

        if (($handle = fopen($request->file('csv')->getRealPath(), 'r')) !== false) {
            fgetcsv($handle); // Skip header row
            while (($data = fgetcsv($handle, 0, ',')) !== false) {
                // Create a unique key based on indices 3, 4, and 5
                $key = $data[3] . '-' . $data[4] . '-' . $data[5];
                if (!array_key_exists($key, $distinctData)) {
                    // Store distinct values and the original data for later use
                    $distinctData[$key] = [
                        'id_leasing' => $data[3],
                        'id_lokasi' => $data[4],
                        'id_motor' => $data[5]
                    ];
                }
                $originalData[] = $data; // Save original data
            }
            fclose($handle);
        }

        $foundDuplicate = false;

        // Check for duplicates in the database
        foreach ($distinctData as $disdat) {
            $cekCicilan = CicilanMotor::where('id_leasing', $disdat['id_leasing'])
                ->where('id_lokasi', $disdat['id_lokasi'])
                ->where('id_motor', $disdat['id_motor'])
                ->exists();

            if ($cekCicilan) {
                $foundDuplicate = true;
                break;
            }
        }

        if ($foundDuplicate) {
            Log::info("data ditemukan dan masuk ke blok hapus data !");
            // Hapus data duplikat dari database sebelum melakukan insert
            foreach ($distinctData as $disdat) {
                CicilanMotor::where('id_leasing', $disdat['id_leasing'])
                    ->where('id_lokasi', $disdat['id_lokasi'])
                    ->where('id_motor', $disdat['id_motor'])
                    ->delete();
                Log::info(["pesan" => "data ini sudah di hapus  !", "data" => $disdat]);
            }
        }

        // Insert all data from the CSV after purification
        foreach ($originalData as $data) {
            CicilanMotor::create([
                'dp' => $data[0],
                'tenor' => $data[1],
                'cicilan' => $data[2],
                'id_leasing' => $data[3],
                'id_lokasi' => $data[4],
                'id_motor' => $data[5],
                // Jika ada kolom lain yang perlu anda masukkan, tambahkan juga di sini
            ]);
        }
        Log::info('data sukses di import !');
    }
}
