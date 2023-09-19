<?php

use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\MotorTerbaruController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->to('/home');
});


// User Area
Route::resource('/home', HomeController::class);
Route::resource('/motor_terbaru', MotorTerbaruController::class);
