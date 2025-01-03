<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\View\Components\EventTicket;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// routes/web.php

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('passes')->name('passes.')->group(function () {
    Route::get('/event', [EventController::class, 'index'])->name('event');
});