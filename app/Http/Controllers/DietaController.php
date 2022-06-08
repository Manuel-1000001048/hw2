<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use App\Models\likes;
use App\Models\utente;
use App\Models\cibo;
use Illuminate\Support\Facades\Session;

class DietaController extends Controller
{
    public function index() {
        $nome=session('nome');      //mettiamo nuova variabile, come variabile di sessione
    if(!isset($nome)){              // se la variabile di sessione non è sattata allora ritorniamo nel login
        return redirect('login');
    }else{                          //se è settata andiamo avanti
        $email=session('email');
        $nome=session('nome');
        $query =  likes::where('Email_UTENTE', $email)->get(); //prendiamo tutti i cibi che l'utente attuale ha scelto per la dieta, è un array

        if(count($query)>0){   //se l'array è pieno vuol dire che esiste qualche alimento selezionato
            $lista=[];        //creiamo una lista vuota
             
            
            for($i=0; $i<count($query); $i++){   //ciclo for, per quante volte è grande l'array con la lista dei cibi selezionati dall'utente

                $risp = cibo::where('Id', $query[$i]->Id_cibo)->first(); //prendiamo tutti i cibi che ha selezionato l'utente
                $stamp="<div>"."<h1>".$risp->Nome. "</h1>"               //qui sistemiamo i cibi in base a come li vogliamo selezionare nella view
                       ."<img src=".$risp->Immagine. "></img>"
                       ."<p>".$risp->Nutrienti. "</p>"
                       ."<p id='delete'>"."[PREMI PER ELIMINARE L'ALIMENTO]". "</p>"
                       . "</div>";
                array_push($lista, $stamp);    //qui inseriamo in un altra lista tutti gli alimenti, però sistemati in HTML
            }
           

           

        }else{
            $risp="<div id='Errore2'>"."Nessun Alimento Selezionato"."</div>";
        }                  
        return view('dieta')
        ->with(['utente'=>$nome])
        ->with(['rit'=>$lista])   //qui gli passiamo la lista per poterla scorrere nella view cioe diete.blade con il foreach
        ;
        
     } 
    }

    public function remove(Request $request) {
        $request->validate([
            'nome' => ['string'],
            'image'=>['string'],
            'nutri'=>['string'],
        ]);

        $nome=$request->nome;
        $images=$request->image;
        $nutri=$request->nutri;
        $emailSession=session('email');
       
        $ciboid=DB::select("SELECT id from cibo where Nome='".$nome."' AND Immagine='".$images."' AND Nutrienti='".$nutri."'"); //qui facciamo la select e troviamo l'arrAY TROVATO
           
        if($ciboid) {    //se non mettiamo la condizione che la query SELECT è andata buon fine non riconosce l'indice 0
            $id_cibo=$ciboid[0]->id; //per prendere l'id del cibo
            $delete=DB::delete("DELETE from likes WHERE Email_utente='".$emailSession."' AND Id_cibo='".$id_cibo."'");
            return response()->json("Rimosso dalla lista");
        }else {
            return response()->json("ERRORE: impossibile rimuovere l'alimento");
        }

    }

}
?>