<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;

class ChatbotSekaligus extends Conversation
{
  protected $nomor_admin = '6282322222023';
  protected $answer;

  public function start()
  {
    // $this->typesAndWaits(2);
    $this->bot->typesAndWaits(2);
    $this->say('Dengan melanjutkan percakapan ini, Anda menyetujui proses pengumpulan dan pemrosesan data pribadi yang Anda berikan kepada kami sesuai dengan tujuan yang ditentukan dalam dan sebagaimana diatur dalam Kebijakan Privasi kami di sini.');
    $this->askForDetails();
  }

  protected function askForDetails()
  {
    $question = Question::create('Mohon beritahu kami nama, domsili, merk motor, kategori motor, tipe motor Anda.');
    $this->say('Contoh pengisian: Dono, Jakarta Selatan, Honda, Matic, Beat CBS 125');
    $this->say('Harap isi sesuai dengan format diatas!.');

    $this->ask($question, function (Answer $answer) {
      $this->answer = $answer->getValue();

      // Validate the format of the answer
      if ($this->isValidFormat($this->answer)) {
        $this->say("Data yang Anda masukan adalah:");
        $this->say($this->answer);
        $this->say('Chat customer service sekarang. !');
        $whatsAppUrl = $this->createWhatsAppMessageUrl();
        $this->say("Silakan <a href=\"{$whatsAppUrl}\" target=\"_blank\">klik di sini</a> untuk chat dengan customer service kami via WhatsApp.");
        $this->say("Terima kasih telah menggunakan layanan kami. Ketik 'mulai' atau 'isi data' untuk memulai percakapan baru.");
      } else {
        $this->say('Maaf, format yang Anda masukkan tidak sesuai. Silakan coba lagi.');
        $this->askForDetails(); // Ask again
      }
    });
  }



  protected function isValidFormat($input)
  {
    // Check if the input has at least 5 comma-separated values
    $parts = explode(',', $input);
    return count($parts) >= 5;
  }

  protected function createWhatsAppMessageUrl()
  {
    $base_url = "https://wa.me/{$this->nomor_admin}?text=";

    // Split the answer into parts
    $parts = explode(',', $this->answer);

    // Extracting the relevant details from the answer
    // Assuming the order is name, domicile, brand, category, type
    $name = trim($parts[0]);
    $brand = isset($parts[2]) ? trim($parts[2]) : 'Unknown brand';
    $type = isset($parts[4]) ? trim($parts[4]) : 'Unknown type';

    // Construct the message
    $message = "Halo admin, nama saya {$name}, saya ingin membeli unit {$brand} {$type}.";

    // Encode the message into a URL-friendly format
    $encodedMessage = urlencode($message);

    // Return the full WhatsApp URL
    return $base_url . $encodedMessage;
  }


  public function run()
  {
    $this->start();
  }


  // perbaikan , belum selesai 
  protected function newConversation()
  {
    $question = Question::create('Mohon beritahu kami nama, domsili, merk motor, kategori motor, tipe motor Anda.');
    $this->say('Contoh pengisian: Dono, Jakarta Selatan, Honda, Matic, Beat CBS 125');
    $this->say('Harap isi sesuai dengan format diatas!.');

    $this->ask($question, function (Answer $answer) {
      $this->answer = $answer->getValue();

      // Validate the format of the answer
      if ($this->isValidFormat($this->answer)) {
        $this->say("Data yang Anda masukan adalah:");
        $this->say($this->answer);
        $this->say('Chat customer service sekarang. !');
        $whatsAppUrl = $this->createWhatsAppMessageUrl();
        $this->say("Silakan <a href=\"{$whatsAppUrl}\" target=\"_blank\">klik di sini</a> untuk chat dengan customer service kami via WhatsApp.");
        $this->say("Terima kasih telah menggunakan layanan kami. Ketik 'mulai' atau 'isi data' untuk memulai percakapan baru.");
      } else {
        $this->say('Maaf, format yang Anda masukkan tidak sesuai. Silakan coba lagi.');
        $this->askForDetails(); // Ask again
      }
    });
  }

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
}
