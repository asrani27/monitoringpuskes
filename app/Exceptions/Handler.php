<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use GuzzleHttp\Psr7\Request as Req;
use GuzzleHttp\Client;
use App\Exception\TelegramException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
        $client  = new Client();
        $url     = "https://api.telegram.org/bot".env("BOTTELEGRAM","1314875498:AAEy9-7isizWK_0Vzr4Jy4pBDJAdzo-WK_A")."/sendMessage";
        $data    = $client->request('GET', $url, [
            'json' =>[
              "chat_id" => env("BOTTELEGRAM_CHATID","1127046145"), 
              "text" => "File : ".$exception->getFile()."\nLine : ".$exception->getLine()."\nCode : ".$exception->getCode()."\nMessage : ".$exception->getMessage(),"disable_notification" => true
            ]
        ]);

        $json = $data->getBody();
      
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }
}
