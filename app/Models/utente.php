<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class utente extends Model{         //la classe la chiamo al plurale rispetto la tbella a cui si riferisce
use HasFactory;
    public $timestamps = false;     //IMPORTANTE metterli sempre allora si aspetta questi campi
    protected $fillable = ['Nome','Cognome', 'Email','Password'];   //in pratica definiamo i campi della mia tabella
    protected $table = 'utente';   //Specifico il nome della TABELLA dato che le convenzioni non sono specificate

    //dentro la classe inseriamo anche le relazioni che appartengono a questa tabella
    public function likes(){
        //Qui inserisco il nome del file dove ho descritto il modello altra tabella
        return $this->belongsToMany('App\Models\cibo', 'likes');
    }
}



?>