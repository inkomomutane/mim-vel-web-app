<?php

use App\Actions\Bairro\CreateBairro;
use App\Actions\Bairro\DeleteBairro;
use App\Actions\Bairro\GetBairros;
use App\Actions\Bairro\UpdateBairro;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/bairros', GetBairros::class)->name('bairro.all');
    Route::post('/dashboard/bairro', CreateBairro::class)->name('bairro.store');
    Route::match(['put', 'patch'], '/dashboard/bairro/{bairro}', UpdateBairro::class)->name('bairro.update');
    Route::delete('/dashboard/bairro/{bairro}', DeleteBairro::class)->name('bairro.delete');
});
