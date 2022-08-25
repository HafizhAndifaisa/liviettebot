<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\CatatPengeluaranConv;
use App\Conversations\CatatPemasukanConv;
use App\Conversations\CatatTransferConv;
use App\Conversations\CekDataKeuanganConv;

class KeuanganController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->listen();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */

    public function catatpengeluaran(BotMan $bot)
    {
        $bot->startConversation(new CatatPengeluaranConv());
    }

    public function catatpemasukan(BotMan $bot)
    {
        $bot->startConversation(new CatatPemasukanConv());
    }

    public function catattransfer(BotMan $bot)
    {
        $bot->startConversation(new CatatTransferConv());
    }

    public function cekdatakeuangan(BotMan $bot)
    {
        $bot->startConversation(new CekDataKeuanganConv());
    }

}
