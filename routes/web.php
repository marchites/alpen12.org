<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\Admin\VotingTokenController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('alumni', AlumniController::class);
Route::post('alumni/whatsapp-blast', [AlumniController::class, 'whatsappBlast'])
->name('alumni.whatsapp');


Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('admin')->group(function () {
    Route::get('/alumni', [AlumniController::class, 'index'])
        ->name('alumni.index');

    Route::post('/alumni/import', [AlumniController::class, 'import'])
        ->name('alumni.import')
        ->middleware('admin');
});

Route::get('/vote/{token}', [VotingController::class,'index']);
Route::post('/vote/{token}', [VotingController::class,'store']);
Route::get('/results', [VotingController::class,'results']);

Route::post('/admin/generate-token', [VotingTokenController::class,'generate']);