<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/mentor', function () {
    return view('mentor');
})->middleware(['auth', 'verified'])->name('mentor');

Route::get('/chat', function () {
    return view('chat');
})->middleware(['auth', 'verified'])->name('chat');

Route::get('/forum', function () {
    return view('forum');
})->middleware(['auth', 'verified'])->name('forum');

Route::get('/friend', function () {
    return view('friend');
})->middleware(['auth', 'verified'])->name('friend');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
