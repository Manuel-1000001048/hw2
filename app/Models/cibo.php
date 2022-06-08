<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cibo extends Model{         //la classe la chiamo al plurale rispetto la tbella a cui si riferisce
    use HasFactory;
    public $timestamps = false;     //IMPORTANTE metterli sempre allora si aspetta questi campi
    protected $fillable = ['Nome','Cognome', 'Email','Password'];   //in pratica definiamo i campi della mia tabella
    protected $table = 'cibo';   //Specifico il nome dato che le convenzioni non sono specificate

    //dentro la classe inseriamo anche le relazioni che appartengono a questa tabella
    public function likes(){
        
        return $this->belongsToMany('App\Models\utente', 'likes');
    }
}



?>