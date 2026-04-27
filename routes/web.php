<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HiddenGemController;
use App\Http\Controllers\DailyOfferController;
use App\Http\Controllers\GuestRequestController;
use App\Http\Controllers\ApprovalController;
use Illuminate\Support\Facades\Route;

// 1. تصحيح الصفحة الرئيسية لتكون welcome (التي تحتوي على أزرار الدخول والعلم)
Route::get('/', function () {
    return view('welcome');
});

// 2. إضافة مسار الـ Dashboard الموحد (تمت إزالة verified)
Route::get('/dashboard', function () {
    $role = strtolower(trim(auth()->user()->role ?? 'tourist'));
    $targetPath = match ($role) {
        'admin'      => '/admin/dashboard',
        'local'      => '/local/dashboard',
        'restaurant' => '/restaurant/dashboard',
        'hotel'      => '/hotel/dashboard',
        'assistant'  => '/assistant/dashboard',
        default      => '/tourist/dashboard',
    };
    return redirect($targetPath);
})->middleware(['auth'])->name('dashboard');

// Admin Routes (تمت إزالة verified)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboards.admin');
    })->name('admin.dashboard');
    Route::patch('/admin/approvals/{attraction}/approve', [ApprovalController::class, 'approve'])->name('admin.approve');
    Route::patch('/admin/approvals/{attraction}/reject', [ApprovalController::class, 'reject'])->name('admin.reject');
});

// Local Routes (تمت إزالة verified)
Route::middleware(['auth', 'role:local'])->group(function () {
    Route::get('/local/dashboard', function () {
        return view('dashboards.local');
    })->name('local.dashboard');
    Route::post('/local/hidden-gems', [HiddenGemController::class, 'store'])->name('local.hidden-gems.store');
});

// Tourist Routes (تمت إزالة verified)
Route::middleware(['auth', 'role:tourist'])->group(function () {
    Route::get('/tourist/dashboard', function () {
        return view('dashboards.tourist');
    })->name('tourist.dashboard');
});

// Restaurant Routes (تمت إزالة verified)
Route::middleware(['auth', 'role:restaurant'])->group(function () {
    Route::get('/restaurant/dashboard', function () {
        return view('dashboards.restaurant');
    })->name('restaurant.dashboard');
    Route::post('/restaurant/offers', [DailyOfferController::class, 'store'])->name('restaurant.offers.store');
    Route::patch('/restaurant/offers/{offer}/toggle', [DailyOfferController::class, 'toggle'])->name('restaurant.offers.toggle');
});

// Hotel Routes (تمت إزالة verified)
Route::middleware(['auth', 'role:hotel'])->group(function () {
    Route::get('/hotel/dashboard', function () {
        return view('dashboards.hotel');
    })->name('hotel.dashboard');
    Route::patch('/hotel/requests/{guestRequest}/status', [GuestRequestController::class, 'updateStatus'])->name('hotel.requests.update');
});

// Assistant Routes (تمت إزالة verified)
Route::middleware(['auth', 'role:assistant'])->group(function () {
    Route::get('/assistant/dashboard', function () {
        return view('dashboards.assistant');
    })->name('assistant.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
