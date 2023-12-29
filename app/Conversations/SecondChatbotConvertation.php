<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class SecondChatbotConversation extends Conversation
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

  public function askDetails()
  {
    $this->ask('Silakan isi detail berikut dengan format: Nama | Domisili | Merk | Kategori | Type Motor | Metode Pembayaran<br>Contoh: John Doe | Jakarta | Yamaha | Sport | R15 | Kredit', function (Answer $answer) {
      $details = explode('|', $answer->getText());

      if (count($details) < 6) {
        $this->say('Mohon masukkan semua detail dengan format yang benar.');
        $this->repeat();
      } else {
        $this->name = trim($details[0]);
        $this->lokasi = trim($details[1]);
        $this->brand = trim($details[2]);
        $this->category = trim($details[3]);
        $this->type = trim($details[4]);
        $this->paymentMethod = trim($details[5]);

        if (strtolower($this->paymentMethod) != 'cash') {
          $this->askLeasingDetails();
        } else {
          $this->confirmDetails();
        }
      }
    });
  }

  public function askLeasingDetails()
  {
    $this->ask('Silakan isi detail leasing dan tenor dengan format: Leasing | Tenor<br>Contoh: Adira Finance | 12', function (Answer $answer) {
      $details = explode('|', $answer->getText());

      if (count($details) < 2) {
        $this->say('Mohon masukkan detail leasing dan tenor.');
        $this->repeat();
      } else {
        $this->leasing = trim($details[0]);
        $this->tenor = trim($details[1]);
        $this->confirmDetails();
      }
    });
  }

  public function confirmDetails()
  {
    $message = "Berikut detail yang Anda masukkan:<br>" .
      "Nama: <strong>$this->name</strong><br>" .
      "Domisili: <strong>$this->lokasi</strong><br>" .
      "Merk: <strong>$this->brand</strong><br>" .
      "Kategori: <strong>$this->category</strong><br>" .
      "Type motor: <strong>$this->type</strong><br>" .
      "Metode Pembayaran: <strong>$this->paymentMethod</strong><br>";

    if (strtolower($this->paymentMethod) != 'cash') {
      $message .= "Leasing: <strong>$this->leasing</strong><br>" .
        "Tenor: <strong>$this->tenor</strong> bulan<br>";
    }

    $this->say($message);

    $question = Question::create("Apakah data tersebut sudah benar?")
      ->addButtons([
        Button::create('Ya')->value('yes'),
        Button::create('Tidak')->value('no')
      ]);

    $this->ask($question, function (Answer $answer) {
      if ($answer->getValue() === 'yes') {
        $this->say('Terima kasih! Anda akan diarahkan ke WhatsApp admin kami.');
        $this->redirectWhatsApp();
      } else {
        $this->say('Silakan ulangi mengisi detail.');
        $this->askDetails();
      }
    });
  }

  protected function redirectWhatsApp()
  {
    $whatsAppUrl = $this->createWhatsAppMessageUrl();
    $this->say("Silakan <a href=\"{$whatsAppUrl}\" target=\"_blank\">klik di sini</a> untuk chat dengan customer service kami via WhatsApp.");
  }

  protected function createWhatsAppMessageUrl()
  {
    $base_url = "https://wa.me/{$this->nomor_admin}?text=";
    $message = "Halo admin, nama saya {$this->name}, saya berdomisili di {$this->lokasi}, ingin membeli {$this->brand} {$this->type} kategori {$this->category} dengan metode pembayaran {$this->paymentMethod}.";

    if (strtolower($this->paymentMethod) != 'cash') {
      $message .= " Saya ingin menggunakan leasing {$this->leasing} dengan tenor {$this->tenor} bulan.";
    }

    return $base_url . urlencode($message);
  }

  public function run()
  {
    $this->askDetails();
  }
}
