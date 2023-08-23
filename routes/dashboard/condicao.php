<?php

use App\Actions\Condicao\CreateCondicao;
use App\Actions\Condicao\DeleteCondicao;
use App\Actions\Condicao\GetCondicaos;
use App\Actions\Condicao\UpdateCondicao;

Route::middleware(['roles:Admin|Super-Admin','auth','verified'])->group(function () {
    Route::get('/dashboard/condicaos', GetCondicaos::class)->name('condicao.all');
    Route::post('/dashboard/condicao', CreateCondicao::class)->name('condicao.store');
    Route::match(['put', 'patch'], '/dashboard/condicao/{condicao}', UpdateCondicao::class)->name('condicao.update');
    Route::delete('/dashboard/condicao/{condicao}', DeleteCondicao::class)->name('condicao.delete');
});
