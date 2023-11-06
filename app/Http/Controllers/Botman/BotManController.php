<?php

namespace App\Http\Controllers\Botman;

use App\Conversations\ChatbotConvertation;
use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use App\Http\Controllers\Controller;

class BotManController extends Controller
{
  public function handle()
  {
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
