<?php

use App\Actions\RegraDeNegocio\CreateRegraDeNegocio;
use App\Actions\RegraDeNegocio\DeleteRegraDeNegocio;
use App\Actions\RegraDeNegocio\GetRegrasDeNegocio;
use App\Actions\RegraDeNegocio\UpdateRegraDeNegocio;

Route::middleware(['roles:Admin|Super-Admin','auth','verified'])->group(function () {
    Route::get('/dashboard/negocios', GetRegrasDeNegocio::class)->name('negocio.all');
    Route::post('/dashboard/negocio', CreateRegraDeNegocio::class)->name('negocio.store');
    Route::match(['put', 'patch'], '/dashboard/negocio/{regraDeNegocio}', UpdateRegraDeNegocio::class)->name('negocio.update');
    Route::delete('/dashboard/negocio/{regraDeNegocio}', DeleteRegraDeNegocio::class)->name('negocio.delete');
});
