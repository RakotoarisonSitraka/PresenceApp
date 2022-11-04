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
// Route::get('/DetailsEmployes',[App\http\Controllers\HomeController::class, 'DetailsEmployes'])->name('DetailsEmployes');
Route::get('/Ajout-employee',[App\http\Controllers\HomeController::class, 'AjoutEmployee'])->name('Ajout-employee');
Route::get('/home',[App\Http\Controllers\HomeController::class,'AfficherEmployer'])->name('home');
Route::get('/Supprimer/{id}',[App\Http\Controllers\HomeController::class,'SupprimerEmployer'])->name('Suppression-employee');
Route::post('/modifierEmployee/{id}',[App\Http\Controllers\HomeController::class,'ModifierEmployee'])->name('modifierEmployee');
/*recherche */
Route::get('/Recherche', [App\Http\Controllers\HomeController::class,'Recherche'])->name('Recherche');


/*présence*/
/*présence employées manapoitra anle page mis anle presence vao avy napidirina*/
Route::get('/Presence',[App\Http\Controllers\HomeController::class,'Presence'])->name('Presence');
/*maka  ny données avy am requete*/
Route::post('/SauverPresence',[App\Http\Controllers\HomeController::class,'SauverPresence'])->name('SauverPresence');
Route::get('/AnnulerPresence/{id}',[App\Http\Controllers\HomeController::class,'AnnulerPresence'])->name('AnnulerPresence');

/*Ajout de role*/
Route::get('/AjoutRole',[App\Http\Controllers\HomeController::class,'AjoutRole'])->name('AjoutRole');
Route::post('/SauverRoles',[App\Http\Controllers\HomeController::class,'SauverRoles'])->name('SauverRoles');
Route::get('/SupprimerRole/{id}',[App\Http\Controllers\HomeController::class,'SupprimerRole'])->name('SupprimerRole');
Route::post('/ModifierRole/{id}',[App\Http\Controllers\HomeController::class,'ModifierRole'])->name('ModifierRole');
/*Horaire du présence*/
Route::get('/Heure/{id}',[App\Http\Controllers\HomeController::class,'Heure'])->name('Heure');
/*statistic*/
Route::get('/Statistique',[App\Http\Controllers\HomeController::class,'Statistique'])->name('Statistique');

/* Insertion Domaine*/
Route::post('/InsertionDomaine',[App\Http\Controllers\HomeController::class,'InsertionDomaine'])->name('InsertionDomaine');
Route::get('/ListeDesDomaines',[App\Http\Controllers\HomeController::class,'ListeDesDomaines'])->name('ListeDesDomaines');
Route::get('/RechercheDate',[App\Http\Controllers\HomeController::class,'RechercheDate'])->name('RechercheDate');
Route::post('/ModifierDomaine/{id}',[App\Http\Controllers\HomeController::class,'ModifierDomaine'])->name('ModifierDomaine');
Route::get('/SupprimerDomaine/{id}',[App\Http\Controllers\HomeController::class,'SupprimerDomaine'])->name('SupprimerDomaine');

/*projets*/
Route::post('/InsertionProjet',[App\Http\Controllers\HomeController::class,'InsertionProjet'])->name('InsertionProjet');
/*ajout dans les formulaires*/
Route::get('/ListProjet',[App\Http\Controllers\HomeController::class,'ListProjet'])->name('ListProjet');/*liste des projet*/
