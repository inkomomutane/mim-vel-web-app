<?php

use App\Actions\Imovel\CreateImovel;
use App\Actions\Imovel\DeleteImovel;
use App\Actions\Imovel\EditImovel;
use App\Actions\Imovel\GetImovels;
use App\Actions\Imovel\StoreImovel;
use App\Actions\Imovel\UpdateImovel;

Route::prefix('dashboard/')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/imovel', GetImovels::class)->name('imovel.all');
    Route::get('/imovel/create', CreateImovel::class)->name('imovel.create');
    Route::get('/imovel/edit/{imovel}', EditImovel::class)->name('imovel.edit');
   Route::post('/imovel/store', StoreImovel::class)->name('imovel.store');
    Route::post('/imovel/{imovel}/update', UpdateImovel::class)->name('imovel.update');
    Route::delete('/imovel/{imovel}', DeleteImovel::class)->name('imovel.delete');
});
