<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ProvinceController;
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
\Illuminate\Support\Facades\App::setLocale('en');
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
        return view('claims.index');
    })->name('dossiers');

    Route::get('contacts', function () {
        return view('main.contacts');
    })->name('contacts');

    Route::get('parametres', function () {
        return view('main.settings');
    })->name('parametres');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    /* to create users and show users list */
    Route::get('users-list',[UserDetailController::class,'index'])->name('users-list');
    /* for branches */
    Route::get('branch-list',[BranchController::class,'index'])->name('branch-list');
    Route::get('create-branch',[BranchController::class,'create'])->name('create-branch');
    Route::post('save-branch',[BranchController::class,'store'])->name('save-branch');
    Route::get('update-branch/{id}',[BranchController::class,'edit'])->name('update-branch');
    Route::put('edit-branch',[BranchController::class,'update'])->name('edit-branch');
    Route::delete('delete-branch/{id}',[BranchController::class,'destroy'])->name('delete-branch');

    /* for claims */
    Route::get('claims-list',[BranchController::class,'index'])->name('claims-list');
    Route::get('create-claims',[BranchController::class,'create'])->name('create-claims');
    Route::post('save-claims',[BranchController::class,'store'])->name('save-claims');
    Route::get('update-claims/{claimnumber}',[BranchController::class,'edit'])->name('update-claims');
    Route::put('edit-claims',[BranchController::class,'update'])->name('edit-claims');
    Route::delete('delete-claims',[BranchController::class,'destroy'])->name('delete-claims');

    /* for provinces */
    Route::get('provinces-list',[ProvinceController::class,'index'])->name('provinces-list');
    Route::get('create-province',[ProvinceController::class,'create'])->name('create-province');
    Route::post('save-province',[ProvinceController::class,'store'])->name('save-province');
    Route::get('update-province/{id}',[ProvinceController::class,'edit'])->name('update-province');
    Route::put('edit-province',[ProvinceController::class,'update'])->name('edit-province');
    Route::delete('delete-province/{id}',[ProvinceController::class,'destroy'])->name('delete-province');
});
Auth::routes();
