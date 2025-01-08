<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('index');
});

Route::get('messages', function () {
    return view('messages');
});

Route::get('dashboard-home', function () {
    return view('homedashboard');
});

Route::get('appointment', function () {
    return view('appointment.createappointment');
});

Route::get('choix-type-compte', function () {
    return view('auth.choise-type-account');
});
