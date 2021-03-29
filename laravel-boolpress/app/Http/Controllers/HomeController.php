<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewMail;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guest.home');
    }

    
    public function contatti(){
        return view('guest.contatti');
    }

    public function contattiSent(Request $request){
	//qua devo inserire una request per prendere i dati
	$data = $request->all();

	//salviamo questi dati tramite la fillable
	$newLead = new Lead(); 
	$newLead->fill($data);
	$newLead->save();
    Mail::to('emanuele@info.com')->send(new SendNewMail($newLead)); 

	//DOPO UN POST SEMPRE UN REDIRECT

	return redirect()->route('confermaInvio')->with('status', 'ok');
    }


    public function contattoInviato(){
        return view('guest.inviato');
    }


}
