<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\Admin\AlumniController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\VotingSettingController;
use App\Http\Controllers\Admin\VotingTokenController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/vote/{token}', [VotingController::class,'index']);
Route::post('/vote/{token}', [VotingController::class,'store']);
Route::get('/results', [VotingController::class,'results']);

Route::middleware('admin')->group(function () {
    Route::get('/admin/alumni', [AlumniController::class, 'index'])->name('admin.alumni.index');
    Route::delete('/admin/alumni/{id}', [AlumniController::class, 'destroy'])->name('admin.alumni.destroy');
    Route::post('/admin/alumni/import', [AlumniController::class, 'import'])->name('admin.alumni.import');
    Route::post('/admin/alumni/whatsapp-blast', [AlumniController::class, 'whatsappBlast'])->name('admin.alumni.whatsapp');

    Route::get('/admin/candidates/create', [CandidateController::class, 'create'])->name('admin.candidates.create');
    Route::post('/admin/candidates', [CandidateController::class, 'store'])->name('admin.candidates.store');

    Route::get('/admin/positions/create', [PositionController::class, 'create'])->name('admin.positions.create');
    Route::post('/admin/positions', [PositionController::class, 'store'])->name('admin.positions.store');
    
    Route::get('/admin/settings/create', [VotingSettingController::class, 'create'])->name('admin.settings.create');
    Route::post('/admin/settings', [VotingSettingController::class, 'store'])->name('admin.settings.store');

    Route::get('/admin/tokens', [VotingTokenController::class, 'index'])->name('admin.tokens.index');
    Route::get('/admin/tokens/create', [VotingTokenController::class, 'create'])->name('admin.tokens.create');
    Route::post('/admin/tokens', [VotingTokenController::class, 'store'])->name('admin.tokens.store');
    Route::post('/admin/tokens/generate', [VotingTokenController::class,'generate'])->name('admin.tokens.generate');
});


