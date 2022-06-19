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
    return view('login');
});

Route::get('/accueil', function () {
    return view('main.index');
});

Route::get('/dashboard', function () {
    return view('main.dashboard');
});

Route::get('/performance', function () {
    return view('main.performance');
});

Route::get('/finance', function () {
    return view('main.finance');
});

Route::get('/calendrier', function () {
    return view('main.calendar');
});

Route::get('/dossiers', function () {
    return view('main.claims');
});

Route::get('/contacts', function () {
    return view('main.contacts');
});

Route::get('/parametres', function () {
    return view('main.settings');
});


