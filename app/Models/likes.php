<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likes extends Model{         //la classe la chiamo al plurale rispetto la tbella a cui si riferisce
    use HasFactory;
    public $timestamps = false;     //IMPORTANTE metterli sempre allora si aspetta questi campi
    protected $fillable = ['Id', 'Email_utente','Id_cibo'];   //in pratica definiamo i campi della mia tabella
    protected $table = 'likes';   //Specifico il nome dato che le convenzioni non sono specificate
}



?>