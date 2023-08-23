<?php

use App\Actions\Media\DeleteBanners;
use App\Actions\Media\GetBanners;
use App\Actions\Media\UploadBanners;

Route::middleware(['roles:Admin|Super-Admin','auth','verified'])->group(function () {
    Route::get('/dashboard/banners', GetBanners::class)->name('banners.all');
    Route::post('/dashboard/upload/banners', UploadBanners::class)->name('banners.store');
    Route::delete('/dashboard/banner/{media}/delete', DeleteBanners::class)->name('banners.delete');
});
