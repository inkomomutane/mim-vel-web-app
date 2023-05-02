<?php

use App\Actions\Condicao\CreateCondicao;
use App\Actions\Condicao\DeleteCondicao;
use App\Actions\Condicao\GetCondicaos;
use App\Actions\Condicao\UpdateCondicao;

Route::get('/dashboard/condicaos', GetCondicaos::class)->middleware(['auth', 'verified'])->name('condicao.all');
Route::post('/dashboard/condicao', CreateCondicao::class)->middleware(['auth', 'verified'])->name('condicao.store');
Route::match(['put', 'patch'], '/dashboard/condicao/{condicao}', UpdateCondicao::class)->middleware(['auth', 'verified'])->name('condicao.update');
Route::delete('/dashboard/condicao/{condicao}', DeleteCondicao::class)->middleware(['auth', 'verified'])->name('condicao.delete');
