<?php

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

use App\Http\Controllers\Admin\Auth\LoginAdminController;
use App\Http\Controllers\Admin\Auth\LogoutAdminController;
use App\Http\Controllers\Admin\BestMotorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HookController;
use App\Http\Controllers\Admin\KotaController;
use App\Http\Controllers\Admin\MerkMotorController;
use App\Http\Controllers\Admin\MotorController;
use App\Http\Controllers\Admin\TypeMotorController;
use App\Http\Controllers\User\BandingkanController;
use App\Http\Controllers\User\BrosurController;
use App\Http\Controllers\User\BrosurKreditController;
use App\Http\Controllers\User\DealerController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\InfoLeasingController;
use App\Http\Controllers\User\MotorTerbaruController;
use App\Http\Controllers\User\SimulasiKreditController;
use App\Http\Controllers\User\SyaratKreditController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserRegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to('/home');
});


// user Login
Route::get('/login', [UserLoginController::class, 'index'])->name('login');
Route::post('/login', [UserLoginController::class, 'store'])->name('login.store');
Route::get('/register', [UserRegisterController::class, 'index'])->name('register');

// User Area
Route::resource('/home', HomeController::class);
// motor menu
Route::resource('/motor_terbaru', MotorTerbaruController::class);
Route::resource('/bandingkan', BandingkanController::class);
Route::resource('/brosur', BrosurController::class);
Route::resource('/dealer', DealerController::class);
// kredit menu
Route::resource('/simulasi_kredit', SimulasiKreditController::class);
Route::resource('/brosur_kredit', BrosurKreditController::class);
Route::resource('/syarat_kredit', SyaratKreditController::class);
Route::resource('/info_leasing', InfoLeasingController::class);

// ajax route
Route::get('/get-model-options', [HomeController::class, 'getModelOptions'])->name('getModelOptions');



// admin area
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [LoginAdminController::class, 'index']);
    Route::post('login', [LoginAdminController::class, 'procesLogin'])->name('login');
    Route::post('logout', [LogoutAdminController::class, 'logout'])->name('logout');
    Route::middleware(['auth.admin:admin'])->group(function () {
        Route::resource('dashboard', DashboardController::class);
        Route::resource('motor', MotorController::class);
        Route::resource('type-motor', TypeMotorController::class);
        Route::resource('merk-motor', MerkMotorController::class);
        Route::resource('best-motor', BestMotorController::class);
        Route::resource('kota', KotaController::class);
        Route::resource('hook', HookController::class);
    });
});



// agung -> form login & register user.

// next -> seeder motor, dinamiskan motor.
