<?php

use App\Actions\Bairro\CreateAttribute;
use App\Actions\Bairro\DeleteAttribute;
use App\Actions\Bairro\GetAttributes;
use App\Actions\Bairro\UpdateAttribute;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/bairros', GetAttributes::class)->name('bairro.all');
    Route::post('/dashboard/bairro', CreateAttribute::class)->name('bairro.store');
    Route::match(['put', 'patch'], '/dashboard/bairro/{bairro}', UpdateAttribute::class)->name('bairro.update');
    Route::delete('/dashboard/bairro/{bairro}', DeleteAttribute::class)->name('bairro.delete');
});
