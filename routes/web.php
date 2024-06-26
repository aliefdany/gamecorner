<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/schedule', [ScheduleController::class, 'indexJoined'])->name('schedule');
    Route::get('/schedule/{id}', [ScheduleController::class, 'show'])->name('schedule.show');
});

Route::post('/order', [OrderController::class, 'store'])->middleware(['auth'])->name('order.store');

Route::get('/dashboard', [OrderController::class, 'indexJoined'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
