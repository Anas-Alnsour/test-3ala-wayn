<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/admin/dashboard', function () {
    return view('dashboards.admin');
})->middleware(['auth', 'verified', 'role:admin'])->name('admin.dashboard');

Route::get('/local/dashboard', function () {
    return view('dashboards.local');
})->middleware(['auth', 'verified', 'role:local'])->name('local.dashboard');

Route::get('/tourist/dashboard', function () {
    return view('dashboards.tourist');
})->middleware(['auth', 'verified', 'role:tourist'])->name('tourist.dashboard');

Route::get('/restaurant/dashboard', function () {
    return view('dashboards.restaurant');
})->middleware(['auth', 'verified', 'role:restaurant'])->name('restaurant.dashboard');

Route::get('/hotel/dashboard', function () {
    return view('dashboards.hotel');
})->middleware(['auth', 'verified', 'role:hotel'])->name('hotel.dashboard');

Route::get('/assistant/dashboard', function () {
    return view('dashboards.assistant');
})->middleware(['auth', 'verified', 'role:assistant'])->name('assistant.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
