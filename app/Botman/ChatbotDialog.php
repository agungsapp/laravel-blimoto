<?php

namespace App\Botman;

use BotMan\BotMan\BotMan;

class ChatbotDialog
{
  public $bot;
  public function __construct(BotMan $bot)
  {
    $this->bot = $bot;
  }

  public function start()
  {
    $this->bot->reply('Dengan melanjutkan percakapan ini, Anda menyetujui proses pengumpulan dan pemrosesan data pribadi yang Anda berikan kepada kami sesuai dengan tujuan yang ditentukan dalam dan sebagaimana diatur dalam Kebijakan Privasi kami di sini.');

    $this->bot->ask('Mohon beritahu kami alamat domisili Anda', function ($ans) {
      $this->bot->update(['lokasi' => $ans]);
      $this->bot->reply('Silakan pilih merk motor yang anda inginkan.');
    });
  }

  public function pilihMerk()
  {
    $this->bot->ask('Yamaha | Honda', function ($ans) {
      $this->bot->update(['merk' => $ans]);
      $this->bot->reply('Silakan pilih kategori motor yang anda inginkan.');
    });
  }

  public function pilihKategori()
  {
    $this->bot->ask('Matic | Bebek | Sport | Big bike', function ($ans) {
      $this->bot->update(['kategori' => $ans]);
      $this->bot->reply('Silahkan pilih type motor yang anda inginkan.');
    });
  }

  public function pilihType()
  {
    $this->bot->ask('Beat | Vario | …', function ($ans) {
      $this->bot->update(['type' => $ans]);
      $this->bot->reply('Silahkan pilih metode pembayaran yang anda inginkan.');
    });
  }

  public function pilihMetodePembayaran()
  {
    $this->bot->ask('Kredit | Cash', function ($ans) {
      $this->bot->update(['metode_pembayaran' => $ans]);
      $this->bot->reply('Silahkan pilih leasing yang anda inginkan.');
    });
  }

  public function pilihLeasing()
  {
    $this->bot->ask('FIF | MCF | Adira', function ($ans) {
      $this->bot->update(['leasing' => $ans]);
      $this->bot->reply('Silahkan pilih tenor yang anda inginkan.');
    });
  }

  public function pilihTenor()
  {
    $this->bot->ask('11 |  17 | 23 | 29 | 35 ', function ($ans) {
      $this->bot->update(['tenor' => $ans]);
      $this->bot->reply('Anda kan terhubung dengan sales dengan detail data berikut : 
      Domisili anda : ' . $this->bot->get('lokasi') . '
      Merk : ' . $this->bot->get('merk') . '
      Kategori : ' . $this->bot->get('kategori') . '
      Type : ' . $this->bot->get('type') . '
      Metode pembayaran : ' . $this->bot->get('metode_pembayaran') . '
      Leasing : ' . $this->bot->get('leasing') . '
      Tenor : ' . $this->bot->get('tenor') . '

      Apakah data tersebut sudah sesuai ?
      Y | N
      ');
    });
  }

  public function konfirmasiData()
  {
    $ans = $this->bot->getMessage();
    if ($ans === 'Y') {
      $this->bot->reply('Data Anda telah berhasil dicatat.');
      $this->bot->reply('Sekarang Anda akan terhubung dengan sales.');
      $this->bot->sendMessage('sales@motor.com', 'Ada calon pembeli baru dengan detail data berikut:
      Domisili: ' . $this->bot->get('lokasi') . '
      Merk: ' . $this->bot->get('merk') . '
      Kategori: ' . $this->bot->get('kategori') . '
      Type: ' . $this->bot->get('type') . '
      Metode pembayaran: ' . $this->bot->get('metode_pembayaran') . '
      Leasing: ' . $this->bot->get('leasing') . '
      Tenor: ' . $this->bot->get('tenor') . '
      Silakan segera hubungi calon pembeli ini.');
    } else {
      $this->bot->reply('Mohon maaf, data yang Anda berikan tidak sesuai.');
      $this->bot->reply('Silahkan ulangi kembali.');
    }
  }
}
