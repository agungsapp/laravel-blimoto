<?php

namespace App\Http\Controllers\Botman;

use App\Conversations\SecondChatbotConversation;
use App\Http\Controllers\Controller;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\LaravelCache;

class SecondControllerChat extends Controller
{
    public function handle()
    {
        $config = config('botman.web');
        $botman = BotManFactory::create($config, new LaravelCache());
        $botman = app('botman');
        $botman->hears('mulai', function ($bot) {
            $bot->startConversation(new SecondChatbotConversation);
        });
        $botman->fallback(function ($bot) {
            $bot->reply('Maaf saya tidak mengerti, silahkan ketikan "mulai" untuk melakukan pembelian motor');
        });
        $botman->listen();
    }
}
