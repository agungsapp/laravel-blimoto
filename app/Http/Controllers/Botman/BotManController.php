<?php

namespace App\Http\Controllers\Botman;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use App\Botman\ChatbotDialog;
use App\Http\Controllers\Controller;

class BotManController extends Controller
{
  public function handle(Request $request)
  {
    $botman = app('botman');

    $dialog = new ChatbotDialog($botman);

    $botman->hears('start', function (BotMan $bot) use ($dialog) {
      $dialog->start();
    });

    $botman->hears('pilih_merk', function (BotMan $bot) use ($dialog) {
      $dialog->pilihMerk();
    });

    $botman->hears('pilih_kategori', function (BotMan $bot) use ($dialog) {
      $dialog->pilihKategori();
    });

    $botman->hears('pilih_type', function (BotMan $bot) use ($dialog) {
      $dialog->pilihType();
    });

    $botman->hears('pilih_metode_pembayaran', function (BotMan $bot) use ($dialog) {
      $dialog->pilihMetodePembayaran();
    });

    $botman->hears('pilih_leasing', function (BotMan $bot) use ($dialog) {
      $dialog->pilihLeasing();
    });

    $botman->hears('pilih_tenor', function (BotMan $bot) use ($dialog) {
      $dialog->pilihTenor();
    });

    $botman->hears('konfirmasi_data', function (BotMan $bot) use ($dialog) {
      $dialog->konfirmasiData();
    });

    $botman->listen();
  }
}
