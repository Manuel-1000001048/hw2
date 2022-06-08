<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use DB;
use Illuminate\Http\Request;
use App\Models\utente;
use App\Models\likes;
use App\Models\cibo;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //
    public function index() {
        $nome=session('nome');      //mettiamo nuova variabile, come variabile di sessione
    if(!isset($nome)){              // se la variabile di sessione non è sattata allora ritorniamo nel login
        return redirect('login');
    }else{                          //se è settata andiamo avanti
        $nome=session('nome');                        
        return view('home')
        ->with(['utente'=>$nome]);   // utente nella pagina home viene visto come una varibile, quindi dobbiamo metterlo con {{ $utente }}
                                     // contiene il valore nome della sessione
                                     
     }
    }

    public function ricerca($alimento) {
      $curl = curl_init();
      $String=$alimento;
      curl_setopt_array($curl, [
	    CURLOPT_URL => "https://edamam-food-and-grocery-database.p.rapidapi.com/parser?ingr=$String",
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_FOLLOWLOCATION => true,
	    CURLOPT_ENCODING => "",
	    CURLOPT_MAXREDIRS => 10,
	    CURLOPT_TIMEOUT => 30,
	    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	    CURLOPT_CUSTOMREQUEST => "GET",
	    CURLOPT_HTTPHEADER => [
		  "X-RapidAPI-Host: edamam-food-and-grocery-database.p.rapidapi.com",
		  "X-RapidAPI-Key:".env('Ricerca_ApiKey')  // la chiave della API di solito si mette nel file .env quindi li troveremo il testo della chiave
	    ],
     ]);

     $response = curl_exec($curl);
     $err = curl_error($curl);

     curl_close($curl);

     if ($err) {  //invece di echo mettiamo il return cosi si converte automaticamente il json
	  return "cURL Error #:" . $err;
     } else {
	  return  $response;
      }
    }

    public function checkLike(Request $request) {
        $request->validate([
            'nome' => ['string'],
            'image'=>['string'],
            'nutri'=>['string'],
        ]);
    $risp1="Alimento già inserito nella tua dieta";   
    $nome=$request->nome;
    $images=$request->image;
    $nutri=$request->nutri;
    $emailSession=session('email'); //Prendo la sessione di email che mi serve per id della tabella utente
    $SelectCibo =cibo::where('Nome', $nome)->where('Immagine', $images)->where('Nutrienti', $nutri)->get();  //questa è giusta dobbiamo sistemare l'immagine
    //$resSelectCibo=mysqli_query($conn, $SelectCibo);        //IMPORTANTE DOPO UNA QUERY FARE SEMPRE IL RES ALLORA LA QUERY NON FUNZIONA E RESTITUISCE ERRORE
    
    if(count($SelectCibo)>0){ //se già IL CIBO è presente nella tabella cibo allora devo inserirlo solo in likes
        $id_cibo=$SelectCibo[0]->Id;  //Per trovare l'id del cibo appena selezionato dato che prima abbiamo fatto la select
        $controllikes=likes::where('Email_utente', $emailSession)->where('Id_cibo', $id_cibo)->get(); //se già l'utente lo ha inserito nella dieta
        
        if(count($controllikes)>0){
            return response()->json("Alimento già inserito nella tua dieta");
        }else{
            $query3=DB::insert("INSERT into likes(Email_utente, Id_cibo) VALUES ('$emailSession', '$id_cibo')"); //inseriamo il nuovo like
            return response()->json("Molte persone come te, hanno scelto questo alimento");
        }

    }else //se cibo selezionato non c'è ancora nella tabella cibo
    {
        $query=DB::insert("INSERT into cibo(Nome, Immagine, Nutrienti) VALUES ('$nome', '$images', '$nutri')"); //Lo inseriamo anche in cibo
        if($query) {  //se l'inserimento va a buon fine
            $select_id=DB::select("SELECT id from cibo where Nome='".$nome."'"); //qui facciamo la select e troviamo l'arrAY TROVATO
            $id_cibo=$select_id[0]->id; // QUI TROVIAMO L'ID
            $query3=DB::insert("INSERT into likes(Email_utente, Id_cibo) VALUES ('$emailSession', '$id_cibo')");
            return response()->json("Alimento Inserito nella tua dieta");
        } else{
            return response()->json("Errore, Alimento non inserito nella dieta");
        }   
        
    }
    
   }
        

    

   
}
