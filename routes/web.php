<?php

use App\Http\Controllers\Admin\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('login');

    Route::post('/admin/login', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');
});

Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');

    Route::view('/sources', 'admin.sources.index')->name('sources.index');

    Route::view('/opportunities', 'admin.opportunities.index')
        ->name('opportunities.index');

    Route::view('/editions', 'admin.editions.index')->name('editions.index');

    Route::view('/subscribers', 'admin.subscribers.index')
        ->name('subscribers.index');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
