<?php

use App\Actions\Bairro\CreateBairro;
use App\Actions\Bairro\DeleteBairro;
use App\Actions\Bairro\GetBairros;
use App\Actions\Bairro\UpdateBairro;

Route::middleware(['roles:Admin|Super-Admin'])->group(function () {
    Route::get('/dashboard/bairros', GetBairros::class)->middleware(['auth', 'verified'])->name('bairro.all');
    Route::post('/dashboard/bairro', CreateBairro::class)->middleware(['auth', 'verified'])->name('bairro.store');
    Route::match(['put', 'patch'], '/dashboard/bairro/{bairro}', UpdateBairro::class)->middleware(['auth', 'verified'])->name('bairro.update');
    Route::delete('/dashboard/bairro/{bairro}', DeleteBairro::class)->middleware(['auth', 'verified'])->name('bairro.delete');
});
