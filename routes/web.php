<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/resetpassword', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'show'])->name('reset.password');

//edit details Routes
Route::get('/EditDetails', [App\Http\Controllers\InfoController::class, 'index'])->name('info_page');
Route::post('/storeDetails', [App\Http\Controllers\InfoController::class, 'store'])->name('store_info_page');
Route::Get('/editDetails/{id}', [App\Http\Controllers\InfoController::class, 'edit'])->name('edit_info_page');
Route::put('/updateDetails/{id}', [App\Http\Controllers\InfoController::class, 'update'])->name('update_info_page');
Route::get('/workerslist', [App\Http\Controllers\InfoController::class, 'showWorkersList'])->name('show_workrs_list');

//previous works
Route::get('/add_Works_form/{id}', [App\Http\Controllers\WorksController::class, 'create'])->name('works_form');
Route::post('/storeWorks', [App\Http\Controllers\WorksController::class, 'store'])->name('store_Works');
Route::get('/workdetails/{id}', [App\Http\Controllers\WorksController::class, 'show'])->name('works_details');
Route::get('/workdetailsedit/{id}', [App\Http\Controllers\WorksController::class, 'edit'])->name('works_edit');
Route::put('/workdetailsupdate/{id}', [App\Http\Controllers\WorksController::class, 'update'])->name('works_update');
Route::delete('/workdelete/{id}', [App\Http\Controllers\WorksController::class, 'destroy'])->name('works_delete');

