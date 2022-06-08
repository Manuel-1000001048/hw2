<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\utente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function index() {

        return view('login')                 //pagina da visulizzare cioè la pagina di login
        ->with('csrf_token', csrf_token()); 
         

     }

     public function checkLogin() {
        
        $value = (request('password'));  //Password inserita da tastiera nel form, noi possiamo solo verificare se è uguale a quella gia inserita
        $utenti = utente::where('Email', request('email'))->first();
        // dd($utenti);
        //return view('login');

        if($utenti !== null && Hash::check($value, $utenti->Password)) {   
            //la tabella non deve essere vuota, e la password inserita deve essere uguale a quella nel database allora passa avanti
            $nome=Session::put('nome', $utenti->Nome);   
            $email=Session::put('email', $utenti->Email);
            return redirect('home');
        }
        else {
            return redirect('login')->withInput();
        }
    }

    public function logout() {
        Session::flush();
        return redirect('login');
    }
}
