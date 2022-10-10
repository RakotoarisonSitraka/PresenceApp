<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    if(Auth::user()){//rah authentifié les user SAD mbola connecté
        return view('home');
    } else {
        return view('auth/login');
    }
});

Auth::routes();

//partie USER
Route::get('/ListeAdmin',[App\Http\Controllers\HomeController::class,'index'])->name('ListeAdmin');
Route::get('/SupprimerUser/{id}',[App\Http\Controllers\HomeController::class,'SupprimerUser'])->name('SupprimerUser');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/modifier/{id}',[App\Http\Controllers\HomeController::class,'modifier'])->name('modifier');
Route::get('/change-mdp',[App\http\Controllers\HomeController::class, 'ChangePassword'])->name('change-mdp');
Route::post('/change-mdp',[App\http\Controllers\HomeController::class, 'updatePassword'])->name('update-mdp');

//coté employée
// Route::get('/Ajout-employee',[App\http\Controllers\HomeController::class, 'AjoutEmployee'])->name('Ajout-employee');
Route::post('/AjoutEmployee',[App\http\Controllers\HomeController::class, 'AddEmployee'])->name('add-employee');
Route::get('/Ajout-employee',[App\http\Controllers\HomeController::class, 'AjoutEmployee'])->name('Ajout-employee');
Route::get('/home',[App\Http\Controllers\HomeController::class,'AfficherEmployer'])->name('home');
Route::get('/Supprimer/{id}',[App\Http\Controllers\HomeController::class,'SupprimerEmployer'])->name('Suppression-employee');
Route::post('/modifierEmployee/{id}',[App\Http\Controllers\HomeController::class,'ModifierEmployee'])->name('modifierEmployee');
/*recherche */
Route::get('/Recherche', [App\Http\Controllers\HomeController::class,'Recherche'])->name('Recherche');

/*présence employées*/
Route::get('/Presence',[App\Http\Controllers\HomeController::class,'Presence'])->name('Presence');

/*Ajout de role*/
Route::get('/AjoutRole',[App\Http\Controllers\HomeController::class,'AjoutRole'])->name('AjoutRole');

/*statistic*/
Route::get('/Statistique',[App\Http\Controllers\HomeController::class,'Statistique'])->name('Statistique');