<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class LoginController extends Controller
{
    public function login(Request $req)
    {
        $login = request()->input('username');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(Auth::attempt([$field => $login, 'password' => request()->password], false)) 
        {
            return redirect('/home');
        } 
        else 
        {
            Alert::info('Username / Password Salah', 'warning');
            return back();
        }
    }
}
