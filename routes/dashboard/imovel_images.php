<?php

use App\Actions\Imovel\image\AddImovelImages;
use App\Actions\Imovel\image\DeleteImovelImages;
use App\Actions\Imovel\image\GetImovelImages;

Route::middleware(['roles:Admin|Super-Admin'])->group(function () {
    Route::get('/dashboard/imovel/{imovel}/image/all', GetImovelImages::class)->middleware(['auth', 'verified'])->name('imovel.image.all');
    Route::post('/dashboard/upload/imovel/{imovel}/image', AddImovelImages::class)->middleware(['auth', 'verified'])->name('imovel.image.store');
    Route::delete('/dashboard/imovel/image/{media}/delete', DeleteImovelImages::class)->middleware(['auth', 'verified'])->name('imovel.image.delete');
});
