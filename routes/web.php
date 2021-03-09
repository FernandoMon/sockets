<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\GuideController::class, 'index'])->name('home');
Route::get('/guide', [App\Http\Controllers\GuideController::class, 'create'])->name('create');
Route::post('/guide', [App\Http\Controllers\GuideController::class, 'store'])->name('store');

