<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::get('/dashboard', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/dashboard', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/dashboard/{user}/logo/upload',[ProfileController::class,'logoUpload'])->name('profile.logo.update');
    Route::delete('/dashboard', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
