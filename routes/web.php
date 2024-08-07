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

use App\Http\Controllers\Admin\AdminAreaManagerController;
use App\Http\Controllers\Admin\AdminArtisanController;
use App\Http\Controllers\Admin\AdminCeoController;
use App\Http\Controllers\Admin\AdminCicilanMotorController;
use App\Http\Controllers\Admin\AdminColorController;
use App\Http\Controllers\Admin\AdminCompanyProfileController;
use App\Http\Controllers\Admin\AdminDataPembayaranController;
use App\Http\Controllers\Admin\AdminDealerController;
use App\Http\Controllers\Admin\AdminDiskonMotorController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminHasilController;
use App\Http\Controllers\Admin\AdminLaporanPenjualanWilayahController;
use App\Http\Controllers\Admin\AdminLaporanSemuaPenjualanController;
use App\Http\Controllers\Admin\AdminManagerController;
use App\Http\Controllers\Admin\AdminManualRefundController;
use App\Http\Controllers\Admin\AdminMotorColorController;
use App\Http\Controllers\Admin\AdminMtrBestMotorController;
use App\Http\Controllers\Admin\AdminPembayaranController;
use App\Http\Controllers\Admin\AdminPengajuanAksesPenjualan;
use App\Http\Controllers\Admin\AdminPengajuanRefundController;
use App\Http\Controllers\Admin\AdminPenjualanAccConntroller;
use App\Http\Controllers\Admin\AdminPenjualanCancelController;
use App\Http\Controllers\Admin\AdminPenjualanController;
use App\Http\Controllers\Admin\AdminPenjualanDoConntroller;
use App\Http\Controllers\Admin\AdminPenjualanHasilController;
use App\Http\Controllers\Admin\AdminPenjualanProsesConntroller;
use App\Http\Controllers\Admin\AdminPenjualanRijectConntroller;
use App\Http\Controllers\Admin\AdminPromoController;
use App\Http\Controllers\Admin\AdminSalesController;
use App\Http\Controllers\Admin\AdminSalesSettingController;
use App\Http\Controllers\Admin\AdminSlikController;
use App\Http\Controllers\Admin\AdminSPKController;
use App\Http\Controllers\Admin\AdminStatusBiController;
use App\Http\Controllers\Admin\AdminStatusRefund;
use App\Http\Controllers\Admin\AdminTagihanController;
use App\Http\Controllers\Admin\AdminTagihanSudahBayarController;
use App\Http\Controllers\Admin\AdminTypeSlikController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminWarnaMotorController;
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
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Botman\BotManController;
use App\Http\Controllers\Twilio\SendWhatsappOtpController;
use App\Http\Controllers\User\AboutUsController;
// user
use App\Http\Controllers\User\BandingkanController;
use App\Http\Controllers\User\BrosurController;
use App\Http\Controllers\User\BrosurKreditController;
use App\Http\Controllers\User\CariDiskonController;
use App\Http\Controllers\User\CicilanMotorController;
use App\Http\Controllers\User\DealerController;
use App\Http\Controllers\User\DetailMotorControllerUser;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\InfoLeasingController;
use App\Http\Controllers\User\MotorTerbaruController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SimulasiKreditController;
use App\Http\Controllers\User\SyaratKreditController;
use App\Http\Controllers\User\UserBlogController;
use App\Http\Controllers\User\UserCekSlikController;
use App\Http\Controllers\User\UserEventController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserMotorController;
use App\Http\Controllers\User\UserPromosiController;
use App\Http\Controllers\User\UserRegisterController;
// lain lain
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return redirect()->to('/home');
});
Route::get('/app', function () {
    return redirect()->to(route('admin.login'));
});

Route::get('/admin/login', function () {
    return redirect()->to(route('admin.'));
});


Route::get(
    'error',
    fn () =>
    view('admin.error')
);


// user Login
Route::get('/login', [UserLoginController::class, 'index'])->name('login');
Route::post('/request-otp', [UserLoginController::class, 'requestOTP'])->name('requestOTP');
Route::post('/verify-login', [UserLoginController::class, 'verifyOTP'])->name('verifyOTP');
Route::delete('/logout', [UserLoginController::class, 'destroy'])->name('login.destroy');
Route::get('/register', [UserRegisterController::class, 'index'])->name('register');
Route::post('/register', [UserRegisterController::class, 'store'])->name('register.store');
Route::post('/register-verified', [UserRegisterController::class, 'verifikasi'])->name('register.verif');
Route::resource('/profil', ProfileController::class);

// chatbot
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);
Route::match(['get', 'post'], '/botman/start', [BotManController::class, 'startConversation']);

// User Area
Route::resource('/home', HomeController::class);
Route::resource('/about-us', AboutUsController::class);
// motor menu
Route::resource('/motor', MotorTerbaruController::class);
Route::get('/sort/tinggi', [MotorTerbaruController::class, 'getMotorTinggiRendah']);
Route::get('/sort/rendah', [MotorTerbaruController::class, 'getMotorRendahTinggi']);
Route::get('/sort/terbaru', [MotorTerbaruController::class, 'getMotorTerbaru'])->name('motor-terbaru');
Route::get('/sort/lokasi', [UserMotorController::class, 'getMotorByLocation']);
Route::get('/sort/merk', [UserMotorController::class, 'getAllMerk']);
Route::get('/sort/motor-by-merk', [UserMotorController::class, 'getMotorByMerk']);
Route::get('/sort/range-harga', [UserMotorController::class, 'getMotorByPriceRange']);
Route::get('/get-motor-tenor', [UserMotorController::class, 'getMotorTenor']);
Route::resource('/bandingkan', BandingkanController::class);
Route::resource('/brosur', BrosurController::class);
Route::resource('/dealer', DealerController::class);
// kredit menu
Route::resource('/simulasi_kredit', SimulasiKreditController::class);
Route::resource('/brosur_kredit', BrosurKreditController::class);
Route::resource('/syarat_kredit', SyaratKreditController::class);
Route::resource('/info_leasing', InfoLeasingController::class);
Route::resource('/blog', UserBlogController::class);
// promosi menu
Route::resource('/promosi', UserPromosiController::class);
// cek slik menu
Route::resource('/cek-slik', UserCekSlikController::class);
// event menu
Route::resource('/event', UserEventController::class);

// ajax route
Route::get('/get-model-options', [HomeController::class, 'getModelOptions'])->name('getModelOptions');
Route::get('/get-dp', [HomeController::class, 'getDpMotor']);
Route::get('/get-type', [HomeController::class, 'getTypeMotor']);
Route::get('/get-merk', [HomeController::class, 'getMerkMotor']);
Route::get('/get-tenor', [HomeController::class, 'getTenor']);
Route::get('/get-kota', [HomeController::class, 'getLokasi']);
Route::get('/detail-motor', [DetailMotorControllerUser::class, 'getDetailMotor'])->name('detail-motor');
Route::get('/detail-leasing', [DetailMotorControllerUser::class, 'getDetailLeasing'])->name('detail-leasing');
Route::get('/detail-leasing-no-reload', [DetailMotorControllerUser::class, 'getDetailLeasingNoReload'])->name('detail-leasing-no-reload');
Route::get('/search-motor', [HomeController::class, 'getSearchMotor'])->name('search-motor');
// cari dan rekomendasi motor
Route::get('/cari-cicilan', [CicilanMotorController::class, 'searchAndRecommend'])->name('cari-cicilan');
Route::get('/get-harga/{id}', [MotorController::class, 'getHarga']);
Route::get('/get-single-motor/{id}', [BandingkanController::class, 'getSingleMotor']);
// datatables
Route::get('/serverSideMotorKota', [MotorKotaController::class, 'dataTable'])->name('serverSideMotorKota');
Route::get('/serverSideDiskonMotor', [AdminDiskonMotorController::class, 'dataTable'])->name('serverSideDiskonMotor');
Route::get('/serverSideCicilanMotor', [AdminCicilanMotorController::class, 'dataTable'])->name('serverSideCicilanMotor');
Route::get('/serverSideDetailMotor', [DetailMotorController::class, 'serverSideDataTable'])->name('serverSideDetailMotor');
// end datatables
Route::resource('/cari-diskon', CariDiskonController::class);

// admin area
Route::prefix('app')->name('admin.')->group(function () {
    Route::get('login', [LoginAdminController::class, 'index']);
    Route::post('login', [LoginAdminController::class, 'procesLogin'])->name('login');
    Route::get('logout', [LogoutAdminController::class, 'logout'])->name('logout');

    // artisan area
    Route::prefix('artisan')->name('artisan.')->group(function () {
        Route::get('index', [AdminArtisanController::class, 'index'])->name('index');
        Route::get('cache', [AdminArtisanController::class, 'cache'])->name('cache');
        Route::get('view', [AdminArtisanController::class, 'view'])->name('view');
        Route::get('route', [AdminArtisanController::class, 'route'])->name('route');
        Route::get('config', [AdminArtisanController::class, 'config'])->name('config');
        Route::get('storage', [AdminArtisanController::class, 'storage'])->name('storage');
        Route::get('all', [AdminArtisanController::class, 'all'])->name('all');
    });
    // artisan area

    Route::middleware(['role:admin,sales,ceo,manager,area_manager'])->group(function () {
        Route::resource('dashboard', DashboardController::class);
        Route::prefix('penjualan')->name('penjualan.')->group(function () {
            Route::resource('pengajuan-akses', AdminPengajuanAksesPenjualan::class);
            Route::resource('data', AdminPenjualanController::class)->withoutMiddleware(['role:admin,sales,ceo,manager,area_manager']);
            // Route::get('data/hasil/{hasil}', [AdminPenjualanHasilController::class, 'index'])->name('data.hasil');
            Route::resource('proses', AdminPenjualanProsesConntroller::class);
            Route::resource('acc', AdminPenjualanAccConntroller::class);
            Route::resource('riject', AdminPenjualanRijectConntroller::class);
            Route::resource('do', AdminPenjualanDoConntroller::class);
            Route::resource('cancel', AdminPenjualanCancelController::class);
            Route::get('/penjualan/{id}/payment-data', [AdminPenjualanController::class, 'getPaymentData'])->name('payment-data');
            Route::get('/penjualan/{id}/print-data', [AdminPenjualanController::class, 'getPrintData'])->name('print-data');
            Route::get('/penjualan/{id}/getData', [AdminPenjualanController::class, 'getDataPenjualan'])->withoutMiddleware(['role:admin,sales,ceo,manager,area_manager'])->name('getPenjualan');
            Route::get('/penjualan/{id}/get-refund-data', [AdminPenjualanController::class, 'getDataRefund'])->withoutMiddleware(['role:admin,sales,ceo,manager,area_manager'])->name('getDataRefund');
            Route::get('/penjualan/{id}/getDetail', [AdminPenjualanController::class, 'getDetailPembayaran'])->withoutMiddleware(['role:admin,sales,ceo,manager,area_manager'])->name('getDetail');
            Route::post('bayar/{id}', [AdminPenjualanController::class, 'bayar'])->name('bayar-dp');
            Route::post('bayar/tambahPelunasan/{id}', [AdminPenjualanController::class, 'tambahPelunasan'])->withoutMiddleware(['role:admin,sales,ceo,manager,area_manager'])->name('tambahPelunasan');
            Route::post('bayar/pelunasanOffline/{id}', [AdminPenjualanController::class, 'pelunasanOffline'])->withoutMiddleware(['role:admin,sales,ceo,manager,area_manager'])->name('pelunasanOffline');
        });

        Route::prefix('color')->name('color.')->group(function () {
            Route::resource('color', AdminColorController::class);
            // Route::resource('motor', AdminMotorColorController::class);
        });

        Route::prefix('/pengajuan')->name('pengajuan.')->group(function () {
            Route::resource('hak-akses', AdminPengajuanAksesPenjualan::class);
            Route::get('hak-akses-disetujui', [AdminPengajuanAksesPenjualan::class, 'disetujui'])->name('hak-akses.disetujui');
            Route::get('hak-akses-ditolak', [AdminPengajuanAksesPenjualan::class, 'ditolak'])->name('hak-akses.ditolak');
            Route::get('hak-akses-done', [AdminPengajuanAksesPenjualan::class, 'done'])->name('hak-akses.done');
            Route::post('setuju/{id}', [AdminPengajuanAksesPenjualan::class, 'setuju'])->name('setuju');
            Route::post('tolak/{id}', [AdminPengajuanAksesPenjualan::class, 'tolak'])->name('tolak');
            Route::post('publish/{id}', [AdminPengajuanAksesPenjualan::class, 'publish'])->name('publish');
        });

        Route::prefix('laporan')->name('laporan.')->group(function () {
            Route::resource('/penjualan-semua', AdminLaporanSemuaPenjualanController::class);
            Route::resource('/penjualan-wilayah', AdminLaporanPenjualanWilayahController::class);
            Route::post('/cetak-laporan', [AdminLaporanPenjualanWilayahController::class, 'cetakLaporan'])->name('cetak');
            Route::get('/cetak-test', [AdminLaporanPenjualanWilayahController::class, 'testCetak'])->name('test-cetak');
            Route::post('/export/excel', [AdminLaporanPenjualanWilayahController::class, 'exportLaporanExcel'])->name('export-laporan-excel');
        });

        Route::prefix('laporan-tagihan')->name('laporan-tagihan.')->group(function () {
            Route::resource('belum-bayar', AdminTagihanController::class);
            Route::resource('sudah-bayar', AdminTagihanSudahBayarController::class);
        });

        Route::prefix('refund')->name('refund.')->group(function () {
            Route::resource('/pengajuan-refund', AdminPengajuanRefundController::class);
            Route::get('status', [AdminStatusRefund::class, 'index'])->name('status.index');
            Route::post('status', [AdminStatusRefund::class, 'store'])->name('status.store');

            Route::resource('/manual-refund', AdminManualRefundController::class);
            Route::get('riwayat/{id}', [AdminManualRefundController::class, 'riwayatTransaksi'])->name('riwayat.transaksi');
        });

        Route::middleware(['role:admin,sales,ceo,manager,area_manager'])->group(function () {
            Route::resource('motor', MotorController::class);
            Route::resource('type-motor', TypeMotorController::class);
            Route::resource('merk-motor', MerkMotorController::class);
            Route::resource('best-motor', BestMotorController::class);
            Route::resource('leasing-motor', LeasingMotorController::class);
            Route::resource('kota', KotaController::class);
            Route::resource('hook', HookController::class);
            Route::resource('detail-motor', DetailMotorController::class);
            Route::resource('warna-motor', AdminWarnaMotorController::class);
            Route::resource('brosur-motor', BrosurMotorController::class);
            Route::resource('kota-motor', MotorKotaController::class);
            Route::resource('blog', BlogController::class);
            Route::resource('cicilan', AdminCicilanMotorController::class);
            Route::resource('dealer-motor', AdminDealerController::class);
            Route::resource('mitra', MitraKamiController::class);
            Route::resource('diskon-motor', AdminDiskonMotorController::class);
            Route::get('diskon-motor/data', [AdminDiskonMotorController::class, 'data'])->name('diskon-motor.data');
            Route::resource('mtr-best-motor', AdminMtrBestMotorController::class);
            Route::resource('event', AdminEventController::class);
            Route::resource('company-profile', AdminCompanyProfileController::class);
            Route::resource('slik-bi', AdminSlikController::class);
            Route::resource('status-bi', AdminStatusBiController::class);
            Route::resource('type-slik-bi', AdminTypeSlikController::class);
            Route::resource('promo', AdminPromoController::class);
            Route::resource('pembayaran', AdminPembayaranController::class);
            Route::get('data-pembayaran', [AdminDataPembayaranController::class, 'index'])->name('sudah-bayar');
            Route::get('data-pembayaran-tanda-jadi', [AdminDataPembayaranController::class, 'sudahBayarTj'])->name('sudah-bayartj');
            Route::get('data-pembayaran-belum', [AdminDataPembayaranController::class, 'belumBayar'])->name('belum-bayar');

            Route::prefix('penjualan')->name('penjualan.')->group(function () {
                // Route::resource('data', AdminPenjualanController::class);
                Route::resource('hasil', AdminHasilController::class);
                Route::resource('spk', AdminSPKController::class);
            });

            // import penjualan
            Route::post('penjualan/csv/import', [AdminPenjualanController::class, 'importCsv'])->name('penjualan.csv.import');


            Route::get('cetak-pdf', [AdminSPKController::class, 'cetakPDF'])->name('cetakPDF');
            Route::post('cicilan-motor/csv/import', [AdminCicilanMotorController::class, 'importCsv'])->name('cicilan.csv.import');
            Route::post('cicilan-motor/csv/update', [AdminCicilanMotorController::class, 'updateCsv'])->name('cicilan.csv.update');
            Route::delete('cicilan-motor/cicilan/delete', [AdminCicilanMotorController::class, 'deleteCicilan'])->name('cicilan.delete');
            // Route::put('cicilan-motor/update-potongan-tenor', [AdminCicilanMotorController::class, 'updatePotonganTenor'])->name('cicilan.potongan-tenor.update');
            Route::resource('/sales', AdminSalesController::class);
            Route::resource('/users', AdminUserController::class);
            Route::resource('/ceo', AdminCeoController::class);
            Route::resource('/manager', AdminManagerController::class);
            Route::resource('/area-manager', AdminAreaManagerController::class);
        });

        Route::middleware(['role:sales'])->group(function () {
            Route::resource('sales-settings', AdminSalesSettingController::class);
        });
    });
});



// testing
// Route::resource('testing', ProfileController::class);
//sss


// TWILIO WHATSAPP ROUTE
Route::post('/send-whatsapp', [SendWhatsappOtpController::class, 'send']);



// update data session lokasi user : 
Route::post('/updateLokasi', function (Illuminate\Http\Request $request) {
    // Terima data dari permintaan POST
    $lokasiUser = $request->input('lokasiUser');

    // Lakukan sesuatu dengan nilai tersebut, seperti menyimpannya di sesi Laravel
    Session::put('lokasiUser', $lokasiUser);

    // Beri respons ke klien jika diperlukan
    return 'Data berhasil diterima oleh server';
});


Route::get('/spk', function () {
    return view('admin.spk.spk');
});

Route::get('fixing', [AdminPenjualanController::class, 'fixing']);
Route::get('testing/{id}', [AdminPenjualanController::class, 'testing']);



use Illuminate\Support\Facades\Artisan;

Route::get('/clearAll', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');

    return "Cache, config, route, dan view berhasil dihapus!";
});


// LAST SAMPAI DI EDIT PINDAH HALAMAN .
