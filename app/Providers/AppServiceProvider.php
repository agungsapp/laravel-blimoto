<?php

namespace App\Providers;

use Carbon\Carbon;
use Exception;
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
    }
}
