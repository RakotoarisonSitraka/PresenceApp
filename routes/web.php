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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/change-mdp',[App\http\Controllers\HomeController::class, 'ChangePassword'])->name('change-mdp');
Route::post('/change-mdp',[App\http\Controllers\HomeController::class, 'updatePassword'])->name('update-mdp');
