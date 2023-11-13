<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class ChatbotConvertation extends Conversation
{

  protected $name;
  protected $lokasi;
  protected $brand;
  protected $category;
  protected $type;

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
      $this->say('<p class="">Error internal server chabot masih dalam tahap pengembangan </p>');
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
    $this->askName();
  }
}
