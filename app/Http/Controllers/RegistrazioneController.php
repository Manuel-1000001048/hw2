<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\utente;
use Illuminate\Support\Facades\Session;
class RegistrazioneController extends Controller
{
    //
    public function index() {
        return view('registrazione'); //pagina da visulizzare cioè la pagina di registrazione
     } 


     protected function create()
    {
        $request = request();

        if($this->countErrors($request) === 0) {
            $newUtente =  utente::create([       //creiamo un nuovo utente nella tabella utente(Models)
            'Nome' => $request['nome'],
            'Cognome' => $request['cognome'],
            'Email' => $request['email'],
            'Password' => password_hash($request['password'], PASSWORD_BCRYPT),
            
            ]);
            if ($newUtente) {
                $nome=Session::put('nome', $newUtente->Nome);   //Creiamo le variabili di Sessioni, chiave nome= valore del newutente nome
                $email=Session::put('email', $newUtente->Email);
                return redirect('home');
            } 
            else {
                return redirect('registrazione')->withInput();
            }
        }
        else 
            return redirect('registrazione')->withInput();
        
    }



    //queste è una funzione privata quindi si può chiamare solo dentro questo file php, controlla gli errori dei vari input
    private function countErrors($data) {
        $error = array();
        $lunghezza= strlen($data["password"]);
        $contatore=0;
      
      
      For($i=0; $i<$lunghezza; $i++){
              if($data["password"][$i] == "/" || $data["password"][$i] == "+" || $data["password"][$i] == "?" || $data["password"][$i] == "!" ) $contatore++;
      }
        # USERNAME
        // Controlla che rispettino i pattern specificati
        # PASSWORD
        if ($lunghezza < 6 && $contatore<2) {
            $error[] = "Pass corta e senza speciali";
        } 

        if ($lunghezza >= 6 && $contatore<2) {
            $error[] = "Pass senza caratteri speciali";
        } 

        if ($lunghezza < 6 && $contatore>=2) {
            $error[] = "Pass corta";
        } 
        # CONFERMA PASSWORD
        if (strcmp($data["password"], $data["conferma"]) != 0) {
            $error[] = "Le password non coincidono";
        }
        # EMAIL
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = utente::where('email', $data['email'])->first();
            if ($email !== null) {
                $error[] = "Email già utilizzata";
            }
        }

        return count($error);
    }

    public function checkEmail($query) {    //funzione richiamata in js, della registrazione
        $exist = utente::where('email', $query)->exists();
        return ['exists' => $exist];
    }

    

    


}
