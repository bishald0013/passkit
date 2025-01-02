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

// route connects to the event-ticket component
Route::get('/event-ticket', [EventController::class, 'index'])->name('event-pass');

