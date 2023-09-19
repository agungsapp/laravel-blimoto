<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MotorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\BandingkanController;
use App\Http\Controllers\User\BrosurController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\MotorTerbaruController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::resource('/bandingkan', BandingkanController::class);
Route::resource('/brosur', BrosurController::class);



// admin area
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('motor', MotorController::class);
});
