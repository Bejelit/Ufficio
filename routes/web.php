<?php

use App\Http\Controllers\DipendentiController;
use App\Http\Controllers\HomeAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/check', [HomeAuthController::class, 'checkHome'])->name('check');

Route::get('/dipendenti', [DipendentiController::class, 'index'])->middleware(['auth', 'verified'])->name('dipendenti');
Route::get('/aggiungi', [DipendentiController::class, 'create'])->middleware(['auth', 'verified'])->name('aggiungi');
Route::get('/modifica/{worker}', [DipendentiController::class, 'edit'])->middleware(['auth', 'verified'])->name('modifica');
Route::get('/view/{worker}', [DipendentiController::class, 'show'])->middleware(['auth', 'verified'])->name('visualizza');
Route::post('/aggiungi/conferma', [DipendentiController::class, 'store'])->middleware(['auth', 'verified'])->name('conferma');
Route::post('/delete/{worker}', [DipendentiController::class, 'destroy'])->middleware(['auth', 'verified'])->name('delete');
Route::put('/update/{worker}', [DipendentiController::class, 'update'])->middleware(['auth', 'verified'])->name('update');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






require __DIR__.'/auth.php';
