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
// admin

use App\Http\Controllers\Admin\AdminCicilanMotorController;
use App\Http\Controllers\Admin\AdminDealerController;
use App\Http\Controllers\Admin\Auth\LoginAdminController;
use App\Http\Controllers\Admin\Auth\LogoutAdminController;
use App\Http\Controllers\Admin\BestMotorController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrosurMotorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HookController;
use App\Http\Controllers\Admin\KotaController;
use App\Http\Controllers\Admin\MerkMotorController;
use App\Http\Controllers\Admin\MotorController;
use App\Http\Controllers\Admin\TypeMotorController;
use App\Http\Controllers\Admin\DetailMotorController;
use App\Http\Controllers\Admin\LeasingMotorController;
use App\Http\Controllers\Admin\MitraKamiController;
use App\Http\Controllers\Admin\MotorKotaController;
use App\Http\Controllers\User\AboutUsController;
// user
use App\Http\Controllers\User\BandingkanController;
use App\Http\Controllers\User\BrosurController;
use App\Http\Controllers\User\BrosurKreditController;
use App\Http\Controllers\User\CicilanMotorController;
use App\Http\Controllers\User\DealerController;
use App\Http\Controllers\User\DetailMotorControllerUser;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\InfoLeasingController;
use App\Http\Controllers\User\MotorTerbaruController;
use App\Http\Controllers\User\SimulasiKreditController;
use App\Http\Controllers\User\SyaratKreditController;
use App\Http\Controllers\User\UserBlogController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserMotorController;
use App\Http\Controllers\User\UserRegisterController;
// lain lain
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to('/home');
});
Route::get('/app', function () {
    return redirect()->to(route('admin.login'));
});

Route::get('/admin/login', function () {
    return redirect()->to(route('admin.'));
});


// user Login
Route::get('/login', [UserLoginController::class, 'index'])->name('login');
Route::post('/login', [UserLoginController::class, 'store'])->name('login.store');
Route::get('/register', [UserRegisterController::class, 'index'])->name('register');

// try 

// User Area
Route::resource('/home', HomeController::class);
Route::resource('/about-us', AboutUsController::class);
// motor menu
Route::resource('/motor_terbaru', MotorTerbaruController::class);
Route::get('/motor-terbaru/tinggi', [MotorTerbaruController::class, 'getMotorTinggiRendah']);
Route::get('/motor-terbaru/rendah', [MotorTerbaruController::class, 'getMotorRenahTingg']);
Route::get('/motor-terbaru/lokasi', [UserMotorController::class, 'getMotorByLocation']);
Route::get('/motor-terbaru/merk', [UserMotorController::class, 'getAllMerk']);
Route::get('/motor-terbaru/motor-by-merk', [UserMotorController::class, 'getMotorByMerk']);
Route::resource('/bandingkan', BandingkanController::class);
Route::resource('/brosur', BrosurController::class);
Route::resource('/dealer', DealerController::class);
// kredit menu
Route::resource('/simulasi_kredit', SimulasiKreditController::class);
Route::resource('/brosur_kredit', BrosurKreditController::class);
Route::resource('/syarat_kredit', SyaratKreditController::class);
Route::resource('/info_leasing', InfoLeasingController::class);
Route::resource('/blog', UserBlogController::class);

// ajax route
Route::get('/get-model-options', [HomeController::class, 'getModelOptions'])->name('getModelOptions');
Route::get('/get-dp', [HomeController::class, 'getDpMotor']);
Route::get('/get-type', [HomeController::class, 'getTypeMotor']);
Route::get('/get-merk', [HomeController::class, 'getMerkMotor']);
Route::get('/get-tenor', [HomeController::class, 'getTenor']);
Route::get('/get-kota', [HomeController::class, 'getLokasi']);
Route::get('/detail-motor', [DetailMotorControllerUser::class, 'getDetailMotor'])->name('detail-motor');
Route::get('/detail-leasing', [DetailMotorControllerUser::class, 'getDetailLeasing'])->name('detail-leasing');
Route::get('/search-motor', [HomeController::class, 'getSearchMotor'])->name('search-motor');
// cari dan rekomendasi motor
Route::get('/cari-cicilan', [CicilanMotorController::class, 'searchAndRecommend']);
// Route::get('/cicilan-motor', [CicilanMotorController::class, 'hitungCicilan']);
Route::get('/get-harga/{id}', [MotorController::class, 'getHarga']);
Route::get('/get-motor/{id}', [BandingkanController::class, 'getMotor']);
// Route::get('/cicilan-motor/{id}', [CicilanMotorController::class, 'getCicilan'])->where('id', '[0-9]+');



// admin area
Route::prefix('app')->name('admin.')->group(function () {
    Route::get('login', [LoginAdminController::class, 'index']);
    Route::post('login', [LoginAdminController::class, 'procesLogin'])->name('login');
    Route::get('logout', [LogoutAdminController::class, 'logout'])->name('logout');
    Route::middleware(['auth.admin:admin'])->group(function () {
        Route::resource('dashboard', DashboardController::class);
        Route::resource('motor', MotorController::class);
        Route::resource('type-motor', TypeMotorController::class);
        Route::resource('merk-motor', MerkMotorController::class);
        Route::resource('best-motor', BestMotorController::class);
        Route::resource('leasing-motor', LeasingMotorController::class);
        Route::resource('kota', KotaController::class);
        Route::resource('hook', HookController::class);
        Route::resource('detail-motor', DetailMotorController::class);
        Route::resource('brosur-motor', BrosurMotorController::class);
        Route::resource('kota-motor', MotorKotaController::class);
        Route::resource('blog', BlogController::class);
        Route::resource('cicilan', AdminCicilanMotorController::class);
        Route::resource('dealer-motor', AdminDealerController::class);
        Route::resource('mitra', MitraKamiController::class);
        Route::post('cicilan-motor/csv/import', [AdminCicilanMotorController::class, 'importCsv'])->name('cicilan.csv.import');
        Route::post('cicilan-motor/csv/update', [AdminCicilanMotorController::class, 'updateCsv'])->name('cicilan.csv.update');
        Route::put('cicilan-motor/update-potongan-tenor', [AdminCicilanMotorController::class, 'updatePotonganTenor'])->name('cicilan.potongan-tenor.update');
    });
});



// agung -> form login & register user.

// next -> seeder motor, dinamiskan motor.
// test