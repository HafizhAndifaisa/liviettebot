<?php
use App\Http\Controllers\BotManController;
use App\Http\Controllers\CekStokTokoController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('Hello my friend, my name is {name} ', function($bot,$name){
    $bot->reply('Hello '.$name.', I am a bot that can help you');
});

$botman->hears('Cek Stok Toko', CekStokTokoController::class.'@startConversation');