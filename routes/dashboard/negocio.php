<?php

use App\Actions\RegraDeNegocio\CreateRegraDeNegocio;
use App\Actions\RegraDeNegocio\DeleteRegraDeNegocio;
use App\Actions\RegraDeNegocio\GetRegrasDeNegocio;
use App\Actions\RegraDeNegocio\UpdateRegraDeNegocio;

Route::middleware(['roles:Admin|Super-Admin'])->group(function () {
    Route::get('/dashboard/negocios', GetRegrasDeNegocio::class)->middleware(['auth', 'verified'])->name('negocio.all');
    Route::post('/dashboard/negocio', CreateRegraDeNegocio::class)->middleware(['auth', 'verified'])->name('negocio.store');
    Route::match(['put', 'patch'], '/dashboard/negocio/{regraDeNegocio}', UpdateRegraDeNegocio::class)->middleware(['auth', 'verified'])->name('negocio.update');
    Route::delete('/dashboard/negocio/{regraDeNegocio}', DeleteRegraDeNegocio::class)->middleware(['auth', 'verified'])->name('negocio.delete');
});
