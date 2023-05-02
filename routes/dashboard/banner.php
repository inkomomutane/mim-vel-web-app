<?php

use App\Actions\Media\DeleteBanners;
use App\Actions\Media\GetBanners;
use App\Actions\Media\UploadBanners;

Route::get('/dashboard/banners', GetBanners::class)->middleware(['auth', 'verified'])->name('banners.all');
Route::post('/dashboard/upload/banners', UploadBanners::class)->middleware(['auth', 'verified'])->name('banners.store');
Route::delete('/dashboard/delete/banners', DeleteBanners::class)->middleware(['auth', 'verified'])->name('banners.delete');
