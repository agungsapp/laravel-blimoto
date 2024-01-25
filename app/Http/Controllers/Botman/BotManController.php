<?php

namespace App\Http\Controllers\Botman;


use App\Conversations\ChatbotConvertation;
use App\Conversations\ChatbotSekaligus;
use App\Http\Controllers\Controller;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\LaravelCache;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class BotManController extends Controller
{
  public function handle()
  {
    $config = config('botman.web');
    $botman = BotManFactory::create($config, new LaravelCache());

    // $question = Question::create('Silahkan pilih aksi yang ingin dilakukan:')
    //   ->addButtons([
    //     Button::create('Mulai Percakapan')->value('mulai'),
    //     Button::create('Isi Data')->value('isi data'),
    //   ]);
    // $botman->startConversation($question);

    // Load the conversation buttons when the chat starts
    $botman->hears('start_conversation', function ($bot) {
      $this->startConversation($bot);
    });

    $botman->hears('mulai', function ($bot) {
      $bot->startConversation(new ChatbotConvertation);
    });
    $botman->hears('isi data', function ($bot) {
      $bot->startConversation(new ChatbotSekaligus);
    });
    $botman->fallback(function ($bot) {
      $bot->typesAndWaits(2);
      $question = Question::create('Silahkan pilih aksi yang ingin dilakukan:')
        ->addButtons([
          Button::create('Mulai Percakapan')->value('mulai'),
          Button::create('Isi Data')->value('isi data'),
        ]);
      $bot->reply($question);
    });
    $botman->listen();
  }

  // Method to send buttons
  public function startConversation($bot)
  {
    $question = Question::create('Silahkan pilih aksi yang ingin dilakukan:')
      ->addButtons([
        Button::create('Mulai Percakapan')->value('mulai'),
        Button::create('Isi Data')->value('isi data'),
      ]);

    $bot->reply($question);
  }
}

// Pastikan untuk mengganti 'ChatbotConversation' dengan nama conversation yang benar jika berbeda
