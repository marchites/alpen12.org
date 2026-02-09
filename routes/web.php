<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('alumni', AlumniController::class);
Route::post('alumni/whatsapp-blast', [AlumniController::class, 'whatsappBlast'])
->name('alumni.whatsapp');


Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('admin')->group(function () {
    Route::get('/alumni', [AlumniController::class, 'index'])
        ->name('alumni.index');
});