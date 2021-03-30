<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function profile(){

        return view('admin.user.profile');

    }

    public function generaToken(){
        // genera il token
        $api_token = Str::random(80); // questo 80 si riferisce ai caratteri del commento di sopra

        //Seleziono l'utente a cui assegnare il token
        $user = Auth::user();
        $user->api_token = $api_token;

        // all'utente generato in questo momento assegna il token appena generato
        $user->save();


        return redirect()->route('profile');
    }
}
