<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrazioneController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DietaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'it'])) abort(400);
    
    session()->put('locale', $locale);

    return redirect()->back();
})->name('setlanguage');

//---------- ROUTE DELLA REGISTRAZIONE -------------------
Route::get('/registrazione', [RegistrazioneController::class, 'index'])->name('registrazione'); //per poter entrare dentro la pagina registrazione.php
//il primo è url che metti nella barra di ricerca, il secondo è il controller da richiamare e dopo la @ si mette la funzione di quel controller richiamato
Route::post('/registrazione', [RegistrazioneController::class, 'create']); //per prendere i valori del form se sono settati
Route::get('/registrazione/email/{query}', [RegistrazioneController::class, 'checkEmail']);  //controllo email, passiamo come parametro solo valore email


//---------- ROUTE DEL LOGIN-------------------
Route::get('/login', [LoginController::class, 'index'])->name('login');  //mettiamo il nome per passarlo come parametro nel bottone, indica il nome della route
Route::post("/logout", [LoginController::class, 'logout'])->name("logout");
Route::post("/login", [LoginController::class, 'checkLogin']);

//---------- ROUTE DELLA HOME-------------------
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/ricerca/{alimento}', [HomeController::class, 'ricerca']);
Route::any("/home/like", [HomeController::class, 'checkLike'])->name('like');

//---------- ROUTE DELLA DIETA-------------------
Route::get('/dieta', [DietaController::class, 'index'])->name('dieta');
Route::get('/dieta/alimenti', [DietaController::class, 'alimenti'])->name('alimenti');
Route::any("/dieta/remove", [DietaController::class, 'remove'])->name('remove');

?>