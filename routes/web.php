<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Livewire\ProductList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('products', ProductList::class)->name('products');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
