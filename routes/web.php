<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
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

Route::get('/vote/{token}', [VotingController::class,'index'])->name('voting');
Route::post('/vote/{token}', [VotingController::class,'store'])->name('voting.store');
Route::get('/results', [VotingController::class,'results'])->name('election.results');
Route::get('/alumni/create', [AlumniController::class, 'createAlumni'])->name('alumni.create');
Route::post('/alumni', [AlumniController::class, 'storeAlumni'])->name('alumni.store');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware('admin')->group(function () {
    Route::get('/admin/alumni', [AlumniController::class, 'index'])->name('admin.alumni.index');
    Route::delete('/admin/alumni/{id}', [AlumniController::class, 'destroy'])->name('admin.alumni.destroy');
    Route::post('/admin/alumni/import', [AlumniController::class, 'import'])->name('admin.alumni.import');
    Route::post('/admin/alumni/whatsapp-blast', [AlumniController::class, 'whatsappBlast'])->name('admin.alumni.whatsapp');
    Route::get('/admin/alumni/create', [AlumniController::class, 'create'])->name('admin.alumni.create');
    Route::post('/admin/alumni', [AlumniController::class, 'store'])->name('admin.alumni.store');

    Route::get('/admin/candidates', [CandidateController::class, 'index'])->name('admin.candidates.index');
    Route::get('/admin/candidates/create', [CandidateController::class, 'create'])->name('admin.candidates.create');
    Route::post('/admin/candidates', [CandidateController::class, 'store'])->name('admin.candidates.store');

    Route::get('/admin/positions', [PositionController::class, 'index'])->name('admin.positions.index');
    Route::get('/admin/positions/create', [PositionController::class, 'create'])->name('admin.positions.create');
    Route::post('/admin/positions', [PositionController::class, 'store'])->name('admin.positions.store');
    
    Route::get('/admin/settings', [VotingSettingController::class, 'index'])->name('admin.settings.index');
    Route::get('/admin/settings/create', [VotingSettingController::class, 'create'])->name('admin.settings.create');
    Route::post('/admin/settings', [VotingSettingController::class, 'store'])->name('admin.settings.store');

    Route::get('/admin/tokens', [VotingTokenController::class, 'index'])->name('admin.tokens.index');
    Route::get('/admin/tokens/create', [VotingTokenController::class, 'create'])->name('admin.tokens.create');
    Route::post('/admin/tokens', [VotingTokenController::class, 'store'])->name('admin.tokens.store');
    Route::post('/admin/tokens/generate', [VotingTokenController::class,'generate'])->name('admin.tokens.generate');
});


