<?php

namespace App\Http\Controllers;

use App\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $data = Puskesmas::all()->sortBy('nama');
        $puskesmas = $data->map(function($item){
              try {
                $data = DB::connection($item->database)->getPDO();
                $check_connect = 'Y';
              } catch (\Exception $e) {
                $check_connect = 'T';
              }
            $item->koneksi = $check_connect;
            return $item;
        });
        return view('home',compact('puskesmas'));
    }
}
