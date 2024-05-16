<?php

use App\Http\Controllers\Admin\AdminBankController;
use App\Http\Controllers\Admin\AdminPembayaranController;
use App\Http\Controllers\Admin\Api\AdminApiRefundController;
use App\Http\Controllers\Admin\MotorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/midtrans/webhook', [AdminPembayaranController::class, 'midtransWebhook']);

Route::name('api.')->group(function () {
    Route::post('pengajuan-refund/{id}', [AdminApiRefundController::class, 'pengajuanRefund'])->name('pengajuan.refund');
    Route::post('pengajuan-proses/', [AdminApiRefundController::class, 'proses'])->name('pengajuan.proses');
    Route::get('get-bank/', [AdminBankController::class, 'getBank'])->name('get.bank');
    Route::post('get-acc/', [AdminBankController::class, 'getBankAcc'])->name('get.acc');
});

// utils ajax
Route::post('get-motor', [MotorController::class, 'getMotorById']);


// belum terupdate untuk info metode pembayaranya | done
// halaman ceo tampilkan auto atau manual
// besok : proses refund di controller proses , sesuaikan logicnya , baru bikin metrod aja tadi ,

// belum clear, pengajuan manualnya 
