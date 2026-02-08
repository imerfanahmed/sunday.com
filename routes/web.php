<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // Livewire class-based component routes
    Route::get('/boards', \App\Livewire\BoardList::class)->name('boards.index');
    Route::get('/boards/{board}', \App\Livewire\BoardView::class)->name('boards.show');
});

require __DIR__.'/settings.php';
