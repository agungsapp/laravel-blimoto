<?php

namespace App\Botman;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class ChatbotDialog
{
  public $bot;
  public function __construct(BotMan $bot)
  {
    $this->bot = $bot;
  }

  public function start()
  {
    $question = Question::create('Mohon beritahu kami alamat domisili Anda.')
      ->addButtons([
        Button::create('Jakarta Selatan')->value('Jakarta Selatan'),
        Button::create('Bogor')->value('Bogor'),
        // Add more buttons...
      ]);

    $this->bot->ask($question, function (Answer $answer) {
      if ($answer->isInteractiveMessageReply()) {
        $location = $answer->getValue();
        $this->askBrand($location);
      }
    });
  }

  public function askBrand($location)
  {
    $question = Question::create('Silakan pilih merk motor yang anda inginkan.')
      ->addButtons([
        Button::create('Yamaha')->value('Yamaha'),
        Button::create('Honda')->value('Honda'),
        // Add more buttons...
      ]);

    $this->bot->ask($question, function (Answer $answer) use ($location) {
      if ($answer->isInteractiveMessageReply()) {
        $brand = $answer->getValue();
        dd($location, $brand);
        // self::askCategory($botman, $location, $brand);
      }
    });
  }
}
