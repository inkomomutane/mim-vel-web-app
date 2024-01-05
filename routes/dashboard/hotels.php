<?php

use App\Actions\Hotel\CreateHotel;
use App\Actions\Hotel\EditHotel;
use App\Actions\Hotel\GetHotels;
use App\Actions\Hotel\StoreHotel;

Route::prefix('dashboard/')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/hotel', GetHotels::class)->name('hotel.all');
    Route::get('/hotel/create', CreateHotel::class)->name('hotel.create');
    Route::get('/hotel/edit/{hotel}', EditHotel::class)->name('hotel.edit');
    Route::post('/hotel/store', StoreHotel::class)->name('hotel.store');
});
