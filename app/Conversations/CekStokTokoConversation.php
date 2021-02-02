<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class CekStokTokoConversation extends Conversation
{
    
    // public function cekawal()
    // {
    //     $question = Question::create('Mau Cek Stok Apa?')
    //     ->fallback('Kategori Tak Ada')
    //     ->callbackId('no_category')
    //     ->addButtons([
    //         Button::create('Kabel')->value('kabel'),
    //         Button::create('Fitting Lampu')->value('fittinglampu'),
    //         // Button::create('Lampu')->value('lampu'),
    //         // Button::create('Stop Kontak')->value('stopkontak')
    //     ]);
        
    //     return $this->ask($question, function(Answer $answer){
    //         if ($answer->isInteractiveMessageReply()) {
    //             if ($answer->get_value() == 'kabel') {
    //                 $this->say('Oke Kabel Ada');
    //             } elseif ($answer->get_value() == 'fittinglampu') {
    //                 $this->say('Oke Fitting Lampu Ada');
    //             } 
    //             // elseif ($answer->get_value() === 'lampu') {
    //             //     $this->say('Oke Lampu Ada');
    //             // } elseif ($answer->get_value() === 'stopkontak') {
    //             //     $this->say('Oke Stopkontak Ada');
    //             // }
    //         }
    //     });
    // }

    public function cekawal()
    {
        $this->ask('Mau cek stok apa?', function(Answer $answer){
            // $stokapa = $answer->getText();
            if ($answer=='lampu') {
                $this->say('Stok '.$answer.' ada');
                $this->ceklampu();
            } elseif ($answer=='kabel') {
                $this->say('Stok '.$answer.' ada');
            } elseif ($answer=='fitting lampu') {
                $this->say('Stok '.$answer.' ada');
            } elseif ($answer=='stop kontak') {
                $this->say('Stok '.$answer.' ada');
            } else {
                $this->say('maaf barang tidak ada');
                $this->say('ini cuma percobaan aja ya gan');
                $this->cekawal();
            }
            // $this->say('Stok '.$answer.' ada');
        });
    }    

    public function ceklampu()
    {
        $this->ask('Mau cek lampu apa?', function(Answer $answer){

        });
    }

    public function run()
    {
        $this->cekawal();
    }
}
