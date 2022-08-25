<?php
use App\Http\Controllers\BotManController;
use App\Http\Controllers\CekStokTokoController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\MasterController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', BotManController::class . '@startConversation');

$botman->hears('Hello my friend, my name is {name}', function ($bot, $name) {
    $bot->reply('Hello ' . $name . ', I am a bot that can help you');
});

$botman->hears('Cek Stok Toko', CekStokTokoController::class . '@startConversation');

// awal
$botman->hears('/start', function ($bot) {
    $bot->reply(
        'Hi, Ini adalah bot pribadi dengan fungsi :
        - Catat Keuangan (Pengeluaran, Pemasukan, Transfer Dana'
    );
});

// master data
$botman->hears('/cekdatakategori', MasterController::class.'@cekdatakategori');
$botman->hears('/tambahkategori', MasterController::class.'@tambahkategori');
$botman->hears('/editkategori', MasterController::class.'@editkategori');

// data keuangan
$botman->hears('/catatpengeluaran', KeuanganController::class . '@catatpengeluaran');
$botman->hears('/catatpemasukan', KeuanganController::class.'@catatpemasukan');
$botman->hears('/catattransfer', KeuanganController::class.'@catattransfer');
$botman->hears('/cekdatakeuangan', KeuanganController::class.'@cekdatakeuangan');

// fallback no command
$botman->fallback(function ($bot) {
    $bot->reply('Maaf, perintah tidak ada, coba masukkan perintah lain');
});
