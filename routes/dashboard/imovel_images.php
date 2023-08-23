<?php

use App\Actions\Imovel\image\AddImovelImages;
use App\Actions\Imovel\image\DeleteImovelImages;
use App\Actions\Imovel\image\GetImovelImages;

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard/imovel/{imovel}/image/all', GetImovelImages::class)->name('imovel.image.all');
    Route::post('/dashboard/upload/imovel/{imovel}/image', AddImovelImages::class)->name('imovel.image.store');
    Route::delete('/dashboard/imovel/image/{media}/delete', DeleteImovelImages::class)->name('imovel.image.delete');
});
