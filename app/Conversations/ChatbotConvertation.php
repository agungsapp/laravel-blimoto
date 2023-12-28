<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class ChatbotConvertation extends Conversation
{
  protected $nomor_admin = '6282322222023';
  protected $name;
  protected $lokasi;
  protected $brand;
  protected $category;
  protected $type;
  protected $paymentMethod;
  protected $leasing;
  protected $tenor;

  public function askName()
  {
    $this->ask('Silahkan ketikan nama Anda .', function (Answer $answer) {
      $this->name = $answer->getText();
      $this->say("Hallo, $this->name");
      $this->start();
    });
  }

  public function start()
  {
    $this->say('Dengan melanjutkan percakapan ini, Anda menyetujui proses pengumpulan dan pemrosesan data pribadi yang Anda berikan kepada kami sesuai dengan tujuan yang ditentukan dalam dan sebagaimana diatur dalam Kebijakan Privasi kami di sini.');

    $question = Question::create('Mohon beritahu kami domisili Anda.')
      ->addButtons([
        Button::create('Jakarta Selatan')->value('Jakarta Selatan'),
        Button::create('Bogor')->value('Bogor'),
        Button::create('Depok')->value('Depok'),
        Button::create('Tanggerang')->value('Tanggerang'),
        Button::create('Bekasi')->value('Bekasi'),
      ]);

    $this->ask($question, function (Answer $answer) {
      if ($answer->isInteractiveMessageReply()) {
        $this->lokasi = $answer->getValue();
        $this->say("Lokasi yang Anda pilih adalah: $this->lokasi");
        $this->askBrand();
      }
    });
  }

  public function askBrand()
  {
    $question = Question::create('Silakan pilih merk motor yang anda inginkan.')
      ->addButtons([
        Button::create('Honda')->value('Honda'),
        Button::create('Yamaha')->value('Yamaha'),
        Button::create('Suzuki')->value('Suzuki'),
        Button::create('Kawasaki')->value('Kawasaki'),
      ]);

    $this->ask($question, function (Answer $answer) {
      if ($answer->isInteractiveMessageReply()) {
        $this->brand = $answer->getValue();
        $this->say("Merk motor yang Anda pilih adalah: $this->brand");
        $this->askCategory();
      }
    });
  }

  public function askCategory()
  {
    $question = Question::create('Silakan pilih kategori motor yang anda inginkan.')
      ->addButtons([
        Button::create('Matic')->value('Matic'),
        Button::create('Bebek')->value('Bebek'),
        Button::create('Sport')->value('Sport'),
        Button::create('EV')->value('EV'),
        Button::create('Big Bike')->value('Big Bike'),
      ]);

    $this->ask($question, function (Answer $answer) {
      if ($answer->isInteractiveMessageReply()) {
        $this->category = $answer->getValue();
        $this->say("Kategori motor yang Anda pilih adalah: $this->category");
        $this->askType();
      }
    });
  }

  public function askType()
  {
    $this->ask('Silahkan ketikan type nama motor yang anda inginkan.', function (Answer $answer) {
      $this->type = $answer->getText();
      $this->say("Tipe motor yang Anda pilih adalah: $this->type");
      $this->askPaymentMethod();
    });
  }

  public function askPaymentMethod()
  {
    $question = Question::create('Silahkan pilih metode pembayaran yang anda inginkan.')
      ->addButtons([
        Button::create('Kredit')->value('Kredit'),
        Button::create('Cash')->value('Cash'),
      ]);

    $this->ask($question, function (Answer $answer) {
      if ($answer->isInteractiveMessageReply()) {
        $this->paymentMethod = $answer->getValue();
        $this->say("Metode pembayaran yang Anda pilih adalah: $this->paymentMethod");
        if ($this->paymentMethod === 'Cash') {
          $this->confirmDetails();
        } else {
          $this->askLeasing();
        }
      }
    });
  }

  public function askLeasing()
  {
    $question = Question::create('Silahkan pilih leasing yang anda inginkan.')
      ->addButtons([
        Button::create('Adira')->value('Adira'),
        Button::create('FIF')->value('FIF'),
        Button::create('MCF')->value('MCF'),
        Button::create('OTO')->value('OTO'),
      ]);

    $this->ask($question, function (Answer $answer) {
      if ($answer->isInteractiveMessageReply()) {
        $this->leasing = $answer->getValue();
        $this->say("Leasing motor yang Anda pilih adalah: $this->leasing");
        $this->askTenor();
      }
    });
  }

  public function askTenor()
  {
    $question = Question::create('Silahkan pilih tenor yang anda inginkan.')
      ->addButtons([
        Button::create('11')->value('11'),
        Button::create('17')->value('17'),
        Button::create('23')->value('23'),
        Button::create('27')->value('27'),
        Button::create('29')->value('29'),
        Button::create('33')->value('33'),
        Button::create('35')->value('35'),
      ]);

    $this->ask($question, function (Answer $answer) {
      if ($answer->isInteractiveMessageReply()) {
        $this->tenor = $answer->getValue();
        $this->say("Tenor yang Anda pilih adalah: $this->tenor");
        $this->confirmDetails();
      }
    });
  }

  public function confirmDetails()
  {
    $message = "Anda akan terhubung dengan sales dengan detail data. <br>" .
      "Nama: <strong>$this->name</strong> <br>" .
      "Domisili: <strong>$this->lokasi</strong><br>" .
      "Merk: <strong>$this->brand</strong><br>" .
      "Kategori: <strong>$this->category</strong><br>" .
      "Type motor: <strong>$this->type</strong><br>" .
      "Metode Pembayaran: <strong>$this->paymentMethod</strong><br>";

    if ($this->paymentMethod !== 'Cash') {
      $message .= "Leasing: <strong>$this->leasing</strong><br>" .
        "Tenor: <strong>$this->tenor</strong><br>";
    }

    $this->say($message);

    $question = Question::create("Apakah data tersebut sudah sesuai?")
      ->addButtons([
        Button::create('Ya')->value('Y'),
        Button::create('Tidak')->value('N'),
      ]);

    $this->ask($question, function (Answer $answer) {
      if ($answer->isInteractiveMessageReply()) {
        if ($answer->getValue() === 'Y') {
          $this->say('Chat customer service sekarang. !');
          $whatsAppUrl = $this->createWhatsAppMessageUrl();
          $this->say("Silakan <a href=\"{$whatsAppUrl}\" target=\"_blank\">klik di sini</a> untuk chat dengan customer service kami via WhatsApp.");
          $this->say("Terima kasih telah menggunakan layanan kami. Ketik 'mulai' atau 'isi data' untuk memulai percakapan baru.");
        } else {
          $this->askLocation();
        }
      }
    });
  }

  protected function createWhatsAppMessageUrl()
  {
    $base_url = "https://wa.me/{$this->nomor_admin}?text=";
    if ($this->paymentMethod === 'Cash') {
      $message = "Halo admin, nama saya {$this->name}, saya ingin membeli unit {$this->brand} {$this->type} dengan pembayaran tunai (cash).";
    } else {
      $message = "Halo admin, nama saya {$this->name}, saya ingin membeli unit {$this->brand} {$this->type} dengan tenor {$this->tenor} bulan menggunakan leasing {$this->leasing}.";
    }

    // Encode the message for URL
    $url_message = urlencode($message);
    return $base_url . $url_message;
  }

  public function run()
  {
    $this->askName();
  }
}
