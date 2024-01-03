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

}
