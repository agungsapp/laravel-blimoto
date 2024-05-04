<?php

namespace App\Providers;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Carbon::setLocale('id');

        //
        Str::macro('rupiah', function ($value) {
            return 'Rp. ' . number_format($value, 0, '.', '.');
        });

        Str::macro('wa', function ($text) {
            if (is_string($text)) {
                return str_replace(' ', '%', $text);
            } else {
                throw new Exception('Input must be a string');
            }
        });


        Str::macro('getLokasiData', function () {
            return DB::table('cicilan_motor')
                ->join('kota', 'cicilan_motor.id_lokasi', '=', 'kota.id')
                ->select('kota.nama', 'kota.id')
                ->distinct()
                ->get();
        });

        // THS S
        function ambilLokasiTersedia()
        {
            $cari_lokasi =
                DB::table('cicilan_motor')
                ->join('kota', 'cicilan_motor.id_lokasi', '=', 'kota.id')
                ->select('kota.nama', 'kota.id')
                ->distinct()
                ->get();

            if ($cari_lokasi->count() > 0) {
                return response()->json($cari_lokasi, 200);
            }
        }

        function ambilLokasiTersediaTest()
        {
            $find =
                DB::table('kota')
                ->join('cicilan', 'cicilan_motor.id_lokasi', '=', 'kota.id')
                ->select('kota.nama', 'kota.id')
                ->distinct()
                ->get();

            if ($find->count() > 0) {
                return response()->json($find, 200);
            }
        }
        // THS N
    }
}
