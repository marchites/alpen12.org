<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\Admin\VotingTokenController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VotingSettingController;

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

Route::get('/admin/positions/create', [PositionController::class, 'create']);
Route::post('/admin/positions', [PositionController::class, 'store']);

Route::get('/admin/candidates/create', [CandidateController::class, 'create']);
Route::post('/admin/candidates', [CandidateController::class, 'store']);

Route::get('/admin/settings/create', [VotingSettingController::class, 'create']);
Route::post('/admin/settings', [VotingSettingController::class, 'store']);

Route::get('/admin/tokens', [VotingTokenController::class, 'index'])->name('admin.tokens.index');
Route::get('/admin/tokens/create', [VotingTokenController::class, 'create'])->name('admin.tokens.create');
Route::post('/admin/tokens', [VotingTokenController::class, 'store'])->name('admin.tokens.store');


