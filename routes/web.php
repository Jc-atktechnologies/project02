<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClaimCategoryController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\ClaimsController;
use App\Http\Controllers\CustomListController;
use App\Http\Controllers\LossTypeController;
use App\Http\Controllers\PayoutSettingController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\InsurerController;
use App\Http\Controllers\ManagementNoteController;
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

    Route::get('dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::get('performance', function () {
        return view('performance.index');
    })->name('performance');

    Route::get('finance', function () {
        return view('finance.index');
    })->name('finance');

    Route::get('calendar', function () {
        return view('calendar.index');
    })->name('calendar');

    Route::get('claims', function () {
        return view('claims.index');
    })->name('claims');

    Route::get('contacts', function () {
        return view('contacts.index');
    })->name('contacts');

    Route::get('settings', function () {
        return view('settings.index');
    })->name('settings');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    /* to create users and show users list */
    /*Route::get('/{name}', [
            'as' => 'create-user',
            'uses' => UserDetailController::class,'create'
        ]
    )->where('name', 'create-user|account-preference|user-permission|payout-setting|team-membership|skill|attachments|management-notes');*/
    Route::get('users-list',[UserDetailController::class,'index'])->name('users-list');
    Route::get('create-user',[UserDetailController::class,'create'])->name('create-user');
    Route::get('account-preference',[UserDetailController::class,'create'])->name('account-preference');
    Route::get('user-permission',[UserDetailController::class,'create'])->name('user-permission');
    Route::get('payout-setting',[UserDetailController::class,'create'])->name('payout-setting');
    Route::get('team-membership',[UserDetailController::class,'create'])->name('team-membership');
    Route::get('skill',[UserDetailController::class,'create'])->name('skill');
    Route::get('attachments',[UserDetailController::class,'create'])->name('attachments');
    Route::get('management-notes',[UserDetailController::class,'create'])->name('management-notes');
    /* to store the user data */
    Route::post('save-user-information',[UserDetailController::class,'store'])->name('save-user-information');
    Route::put('save-account-preference',[UserDetailController::class,'store_account_preferences'])->name('save-account-preference');
    Route::put('save-user-permissions',[UserDetailController::class,'store_user_permissions'])->name('save-user-permissions');
    Route::post('save-payout',[PayoutSettingController::class,'store'])->name('save-payout');
    Route::post('save-attachment',[AttachmentController::class,'store'])->name('save-attachment');
    Route::post('save-management-notes',[ManagementNoteController::class,'store'])->name('save-management-notes');
    /* for branches */
    Route::get('branch-list',[BranchController::class,'index'])->name('branch-list');
    Route::get('create-branch',[BranchController::class,'create'])->name('create-branch');
    Route::post('save-branch',[BranchController::class,'store'])->name('save-branch');
    Route::get('update-branch/{id}',[BranchController::class,'edit'])->name('update-branch');
    Route::put('edit-branch',[BranchController::class,'update'])->name('edit-branch');
    Route::delete('delete-branch/{id}',[BranchController::class,'destroy'])->name('delete-branch');

    /* for claims */
    Route::get('claims-list',[ClaimsController::class,'index'])->name('claims-list');
    Route::get('create-claims',[ClaimsController::class,'create'])->name('create-claims');
    Route::post('save-claims',[ClaimsController::class,'store'])->name('save-claims');
    Route::get('update-claims/{claimnumber}',[ClaimsController::class,'edit'])->name('update-claims');
    Route::put('edit-claims',[ClaimsController::class,'update'])->name('edit-claims');
    Route::delete('delete-claims',[ClaimsController::class,'destroy'])->name('delete-claims');
    //get assign to user 
    Route::get('ajax_assign_to/{type}',[ClaimsController::class,'get_assign_to_users'])->name('ajax_assign_to');


    Route::get('insured-details',[ClaimsController::class,'insured_details'])->name('insured-details');
    Route::get('loss-details',[ClaimsController::class,'loss_details'])->name('loss-details');
    Route::get('assignment-information',[ClaimsController::class,'assignment_information'])->name('assignment-information');
    /* settings route start */
    //system administration
    Route::get('custom-list',[CustomListController::class,'index'])->name('custom-list');
    /* loss type route */
    Route::get('loss-types',[LossTypeController::class,'index'])->name('loss-types');
    Route::get('create-loss-type',[LossTypeController::class,'create'])->name('create-loss-type');
    Route::post('save-loss-type',[LossTypeController::class,'store'])->name('save-loss-type');
    Route::get('update-loss-type/{id}',[LossTypeController::class,'edit'])->name('update-loss-type');
    Route::put('edit-loss-type',[LossTypeController::class,'update'])->name('edit-loss-type');
    Route::delete('delete-loss-type/{id}',[LossTypeController::class,'destroy'])->name('delete-loss-type');
     /* Calim Category route */
     Route::get('claim-categories-list',[ClaimCategoryController::class,'index'])->name('claim-categories-list');
     Route::get('create-claim-category',[ClaimCategoryController::class,'create'])->name('create-claim-category');
     Route::post('save-claim-category',[ClaimCategoryController::class,'store'])->name('save-claim-category');
     Route::get('update-claim-category/{id}',[ClaimCategoryController::class,'edit'])->name('update-claim-category');
     Route::put('edit-claim-category/{id}',[ClaimCategoryController::class,'update'])->name('edit-claim-category');
     Route::delete('delete-claim-category/{id}',[ClaimCategoryController::class,'destroy'])->name('delete-claim-category');
    /* settings route end */
    /* for cities */
    Route::get('cities-list',[CityController::class,'index'])->name('cities-list');
    Route::get('create-city',[CityController::class,'create'])->name('create-city');
    Route::post('save-city',[CityController::class,'store'])->name('save-city');
    Route::get('update-city/{id}',[CityController::class,'edit'])->name('update-city');
    Route::put('edit-city',[CityController::class,'update'])->name('edit-city');
    Route::delete('delete-city/{id}',[CityController::class,'destroy'])->name('delete-city');

    /* for provinces */
    Route::get('provinces-list',[ProvinceController::class,'index'])->name('provinces-list');
    Route::get('create-province',[ProvinceController::class,'create'])->name('create-province');
    Route::post('save-province',[ProvinceController::class,'store'])->name('save-province');
    Route::get('update-province/{id}',[ProvinceController::class,'edit'])->name('update-province');
    Route::put('edit-province',[ProvinceController::class,'update'])->name('edit-province');
    Route::delete('delete-province/{id}',[ProvinceController::class,'destroy'])->name('delete-province');

    /* for insurers */
    Route::get('insurer-list',[InsurerController::class,'index'])->name('insurer-list');
    Route::get('create-insurer',[InsurerController::class,'create'])->name('create-insurer');
    Route::post('save-insurer',[InsurerController::class,'store'])->name('save-insurer');
    Route::get('update-insurer/{id}',[InsurerController::class,'edit'])->name('update-insurer');
    Route::put('edit-insurer/{id}',[InsurerController::class,'update'])->name('edit-insurer');
    Route::delete('delete-insurer/{id}',[InsurerController::class,'destroy'])->name('delete-insurer');
});

Auth::routes();
