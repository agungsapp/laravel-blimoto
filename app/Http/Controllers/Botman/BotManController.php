<?php

namespace App\Http\Controllers\Botman;

use App\Conversations\ChatbotConvertation;
use App\Conversations\ChatbotSekaligus;
use App\Http\Controllers\Controller;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\LaravelCache;

class BotManController extends Controller
{
  public function handle()
  {
    $config = config('botman.web');
    $botman = BotManFactory::create($config, new LaravelCache());
    $botman = app('botman');
    $botman->hears('mulai', function ($bot) {
      $bot->startConversation(new ChatbotConvertation);
    });
    $botman->hears('isi data', function ($bot) {
      $bot->startConversation(new ChatbotSekaligus);
    });
    $botman->fallback(function ($bot) {
      $bot->reply('Maaf saya tidak mengerti, silahkan ketikan "mulai" atau "isi data"');
    });
    $botman->listen();
  }
}
