<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class CatatPengeluaranConv extends Conversation
{

    protected $tipepengeluaran;
    protected $keterangan;
    protected $jumlahbiaya;

    public function run()
    {
        $this->tanyadatapengeluaran();
    }

    public function tanyadatapengeluaran()
    {
        $question = Question::create("Tipe Pengeluaran")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Makanan')->value('1'),
                Button::create('Bensin')->value('2'),
                Button::create('Lainnya')->value('3'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === '1') {
                    $this->tipepengeluaran=$answer->getValue();
                    $this->pertanyaanlanjut();
                } elseif ($answer->getValue() === '2') {
                    $this->tipepengeluaran=$answer->getValue();
                    $this->pertanyaanlanjut();
                } elseif ($answer->getValue() === '3') {
                    $this->tipepengeluaran=$answer->getValue();
                    $this->pertanyaanlanjut();
                }
            }
        });
    }

    public function pertanyaanlanjut()
    {
        $this->ask('Masukkan Keterangan Pengeluaran', function(Answer $answer){
            $ket = $answer->getText();
            $this->keterangan=$ket;
            $this->tanyajumlahbiaya();
        });
    }

    public function tanyajumlahbiaya()
    {
        $this->ask('Masukkan Jumlah Pengeluaran', function(Answer $answer){
            $jumlah = $answer->getText();
            $this->jumlahbiaya=$jumlah;
            $this->confirmdata();
        });
    }

    public function confirmdata()
    {
        $this->say('Data yang ingin dimasukkan');
        $this->say("Keterangan : $this->keterangan
        Tipe : $this->tipepengeluaran
        Jumlah : $this->jumlahbiaya");

        $question = Question::create("Apakah data benar?")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Benar')->value('1'),
                Button::create('Salah')->value('0'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === '1') {
                    
                } elseif ($answer->getValue() === '0') {
                    $this->say('Ulangi Memasukkan Data');
                    $this->tanyadatapengeluaran();
                } 
            }
        });
    }
}
