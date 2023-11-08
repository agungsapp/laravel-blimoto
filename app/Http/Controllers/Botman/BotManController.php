<?php

namespace App\Http\Controllers\Botman;

use App\Conversations\ChatbotConvertation;
use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use App\Http\Controllers\Controller;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\LaravelCache;

class BotManController extends Controller
{
  public function handle()
  {
    $config = config('botman.web');
    // konfigurasi cache
    $botman = BotManFactory::create($config, new LaravelCache());
    $botman = app('botman');
    $botman->hears('mulai', function ($bot) {
      $bot->startConversation(new ChatbotConvertation);
    });
    $botman->fallback(function ($bot) {
      $bot->reply('Maaf saya tidak mengerti, silahkan ketikan "mulai" untuk melakukan pembelian motor');
    });
    $botman->listen();
  }
}
