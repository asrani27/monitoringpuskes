<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

use GuzzleHttp\Psr7\Request as Req;
use GuzzleHttp\Client;
use App\Repositories\TelegramRepo;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->TelegramRepo = new TelegramRepo;
    }
    
    public function index()
    {
        $data = Auth::user();
        return view('profile',compact('data'));
    }
}
