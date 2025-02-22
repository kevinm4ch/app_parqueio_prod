<?php

use App\Http\Controllers\PatioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PatioController::class, 'getPatios'])->name('dashboard');

Route::get('/patio/{patio_id}', [PatioController::class, 'getPatio'])->name('patio');

Route::post('/patio/{patio_id}', [PatioController::class, 'gerarTicket'])->name('gerar');

Route::get('/pay', [PatioController::class, 'getTicket'])->name('ticket');

Route::post('/pay', [PatioController::class, 'getTicket'])->name('pay');

Route::get('/debug', function () {
    return phpinfo();
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
