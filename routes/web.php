<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});
Route::group(['middleware'=>'auth'],function (){
    Route::get('accueil', function () {
        return view('main.index');
    })->name('accueil');

    Route::get('dashboard', function () {
        return view('main.dashboard');
    })->name('dashboard');

    Route::get('performance', function () {
        return view('main.performance');
    })->name('performance');

    Route::get('finance', function () {
        return view('main.finance');
    })->name('finance');

    Route::get('calendrier', function () {
        return view('main.calendar');
    })->name('calendrier');

    Route::get('dossiers', function () {
        return view('main.claims');
    })->name('dossiers');

    Route::get('contacts', function () {
        return view('main.contacts');
    })->name('contacts');

    Route::get('parametres', function () {
        return view('main.settings');
    })->name('parametres');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Auth::routes();
