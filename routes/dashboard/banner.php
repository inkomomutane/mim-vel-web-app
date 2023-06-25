<?php

use App\Actions\Media\DeleteBanners;
use App\Actions\Media\GetBanners;
use App\Actions\Media\UploadBanners;

Route::middleware(['roles:Admin|Super-Admin'])->group(function () {
    Route::get('/dashboard/banners', GetBanners::class)->middleware(['auth', 'verified'])->name('banners.all');
    Route::post('/dashboard/upload/banners', UploadBanners::class)->middleware(['auth', 'verified'])->name('banners.store');
    Route::delete('/dashboard/banner/{media}/delete', DeleteBanners::class)->middleware(['auth', 'verified'])->name('banners.delete');
});
