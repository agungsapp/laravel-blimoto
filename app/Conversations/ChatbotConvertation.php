<?php

namespace App\Conversations;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Conversations\Conversation;

class ChatbotConvertation extends Conversation
{


  public function start()
  {
    $this->reply('Dengan melanjutkan percakapan ini, Anda menyetujui proses pengumpulan dan pemrosesan data pribadi yang Anda berikan kepada kami sesuai dengan tujuan yang ditentukan dalam dan sebagaimana diatur dalam Kebijakan Privasi kami di sini.');

    $this->ask('Mohon beritahu kami alamat domisili Anda', function ($ans) {
      $this->update(['lokasi' => $ans]);
      $this->reply('Silakan pilih merk motor yang anda inginkan.');
    });
  }

  public function pilihMerk()
  {
    $this->ask('Yamaha | Honda', function ($ans) {
      $this->update(['merk' => $ans]);
      $this->reply('Silakan pilih kategori motor yang anda inginkan.');
    });
  }

  public function pilihKategori()
  {
    $this->ask('Matic | Bebek | Sport | Big bike', function ($ans) {
      $this->update(['kategori' => $ans]);
      $this->reply('Silahkan pilih type motor yang anda inginkan.');
    });
  }

  public function pilihType()
  {
    $this->ask('Beat | Vario | …', function ($ans) {
      $this->update(['type' => $ans]);
      $this->reply('Silahkan pilih metode pembayaran yang anda inginkan.');
    });
  }

  public function pilihMetodePembayaran()
  {
    $this->ask('Kredit | Cash', function ($ans) {
      $this->update(['metode_pembayaran' => $ans]);
      $this->reply('Silahkan pilih leasing yang anda inginkan.');
    });
  }

  public function pilihLeasing()
  {
    $this->ask('FIF | MCF | Adira', function ($ans) {
      $this->update(['leasing' => $ans]);
      $this->reply('Silahkan pilih tenor yang anda inginkan.');
    });
  }

  public function pilihTenor()
  {
    $this->ask('11 |  17 | 23 | 29 | 35 ', function ($ans) {
      $this->update(['tenor' => $ans]);
      $this->reply('Anda kan terhubung dengan sales dengan detail data berikut : 
      Domisili anda : ' . $this->get('lokasi') . '
      Merk : ' . $this->get('merk') . '
      Kategori : ' . $this->get('kategori') . '
      Type : ' . $this->get('type') . '
      Metode pembayaran : ' . $this->get('metode_pembayaran') . '
      Leasing : ' . $this->get('leasing') . '
      Tenor : ' . $this->get('tenor') . '

      Apakah data tersebut sudah sesuai ?
      Y | N
      ');
    });
  }

  public function konfirmasiData()
  {
    $ans = $this->getMessage();
    if ($ans === 'Y') {
      $this->reply('Data Anda telah berhasil dicatat.');
      $this->reply('Sekarang Anda akan terhubung dengan sales.');
      $this->sendMessage('sales@motor.com', 'Ada calon pembeli baru dengan detail data berikut:
      Domisili: ' . $this->get('lokasi') . '
      Merk: ' . $this->get('merk') . '
      Kategori: ' . $this->get('kategori') . '
      Type: ' . $this->get('type') . '
      Metode pembayaran: ' . $this->get('metode_pembayaran') . '
      Leasing: ' . $this->get('leasing') . '
      Tenor: ' . $this->get('tenor') . '
      Silakan segera hubungi calon pembeli ini.');
    } else {
      $this->reply('Mohon maaf, data yang Anda berikan tidak sesuai.');
      $this->reply('Silahkan ulangi kembali.');
    }
  }

  public function run()
  {
    // This will be called immediately
    $this->askName();
  }
}
