<?php 

namespace App\Repositories;

use GuzzleHttp\Psr7\Request as Req;
use GuzzleHttp\Client;

class TelegramRepo
{
    public function sendNotif($exception)
    {
        $client  = new Client();
        $url = "https://api.telegram.org/bot".env("BOTTELEGRAM","1314875498:AAEy9-7isizWK_0Vzr4Jy4pBDJAdzo-WK_A")."/sendMessage";
        $data    = $client->request('GET', $url, [
            'json' =>[
            "chat_id" => env("BOTTELEGRAM_CHATID","1127046145"), 
            "text" => "File : ".$exception->getFile()."\nLine : ".$exception->getLine()."\nCode : ".$exception->getCode()."\nMessage : ".$exception->getMessage(),"disable_notification" => true
            ]
        ]);

        $json = $data->getBody();  
    }
}