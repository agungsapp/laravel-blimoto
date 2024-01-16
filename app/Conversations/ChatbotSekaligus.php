<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class ChatbotSekaligus extends Conversation
{
  protected $nomor_admin = '6282322222023';
  protected $answer, $cashOrKredit, $leasing, $tenor;


  public function start()
  {
    // $this->typesAndWaits(2);
    $this->bot->typesAndWaits(2);
    $this->say('Dengan melanjutkan percakapan ini, Anda menyetujui proses pengumpulan dan pemrosesan data pribadi yang Anda berikan kepada kami sesuai dengan tujuan yang ditentukan dalam dan sebagaimana diatur dalam Kebijakan Privasi kami di sini.');
    $this->askCashOrKredit();
  }

  protected function askCashOrKredit()
  {
    $this->bot->typesAndWaits(2);
    $question = Question::create('Silahkan pilih metode pembayaran yang anda inginkan :')
      ->addButtons([
        Button::create('Cash')->value('cash'),
        Button::create('Kredit')->value('kredit'),
      ]);
    $this->bot->typesAndWaits(1);
    $this->ask($question, function (Answer $answer) {
      if ($answer->isInteractiveMessageReply()) {
        $this->cashOrKredit = $answer->getValue();
        $this->bot->typesAndWaits(1);
        $this->say("Pembayaran yang anda pilih adalah : <strong>$this->cashOrKredit</strong>");

        $konfirmasi = Question::create('apakah metode pembayaran ini sudah sesuai :')
          ->addButtons([
            Button::create('Ya')->value('y'),
            Button::create('Tidak')->value('t'),
          ]);
        $this->bot->typesAndWaits(1);
        $this->ask($konfirmasi, function (Answer $answer) {
          if ($answer->isInteractiveMessageReply()) {
            if ($answer->getValue() == 'y') {
              $this->askForDetails();
            } else {
              $this->askCashOrKredit();
            }
          }
        });
        // $this->askBrand();
      }
    });

    // $this->askForDetails();
  }



  protected function askForDetails()
  {
    $question = Question::create('Harap isi sesuai dengan format diatas!, dengan pemisah tanda <strong>, (koma)</strong>');
    if ($this->cashOrKredit == 'cash') {
      $this->say('<strong>Format pengisian:</strong> (nama), (lokasi anda), (Merk Motor), (type motor), (nama motor)');
      $this->say('<strong>Contoh pengisian:</strong> Dono, Jakarta Selatan, Honda, Matic, Beat CBS 125');
    } else {
      $this->say('<strong>Format pengisian:</strong> (nama), (lokasi anda), (Merk Motor), (type motor), (nama motor), ( nama leasing), (lama tenor)');
      $this->say('<strong>Contoh pengisian:</strong> Dono, Jakarta Selatan, Honda, Matic, Beat CBS 125, Adira, 11');
    }

    $this->bot->typesAndWaits(1);
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

    // Dono, Jakarta Selatan, Honda, Matic, Beat CBS 125
    $name = trim($parts[0]);
    $location = isset($parts[1]) ? trim($parts[1]) : 'Unknown location';
    $brand = isset($parts[2]) ? trim($parts[2]) : 'Unknown brand';
    $type = isset($parts[4]) ? trim($parts[4]) : 'Unknown type';
    $leasing = isset($parts[5]) ? trim($parts[5]) : 'Unknown leasing';
    $tenor = isset($parts[6]) ? trim($parts[6]) : 'Unknown tenor';

    // Construct the message
    if ($this->cashOrKredit == 'cash') {
      $message = "Halo admin, nama saya {$name} lokasi saya di {$location}, saya ingin membeli unit {$brand} {$type} , dengan metode pembayaran {$this->cashOrKredit}.";
    } else {
      $message = "Halo admin, nama saya {$name} lokasi saya di {$location}, saya ingin membeli unit {$brand} {$type}, dengan metode pembayaran {$this->cashOrKredit} melalui leasing {$leasing} dengan lama tenor {$tenor}.";
    }

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

}
