<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\TestResultController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [TestResultController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Patient routes
    Route::resource('patients', PatientController::class);

    // Test routes - taking test and managing test questions
    Route::get('/test/create/{id_pasien}', [TestController::class, 'create'])->name('test.create');
    Route::post('/test/store-results', [TestController::class, 'storeResults'])->name('test.storeResults');
    Route::resource('tests', TestController::class);

    // Condition routes
    Route::resource('conditions', ConditionController::class);

    // Results routes
    Route::get('/results', [TestResultController::class, 'index'])->name('results.index');
    Route::get('/results/{id}', [TestResultController::class, 'show'])->name('results.show');
    Route::delete('/results/{id}', [TestResultController::class, 'destroy'])->name('results.destroy');
});

require __DIR__.'/auth.php';




