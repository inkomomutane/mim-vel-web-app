<?php

use App\Actions\City\CreateCity;
use App\Actions\City\DeleteCity;
use App\Actions\City\GetCities;
use App\Actions\City\UpdateCity;

Route::middleware(['roles:Admin|Super-Admin'])->group(function () {
    Route::get('/dashboard/cities', GetCities::class)->middleware(['auth', 'verified'])->name('city.all');
    Route::post('/dashboard/city', CreateCity::class)->middleware(['auth', 'verified'])->name('city.store');
    Route::match(['put', 'patch'], '/dashboard/city/{city}', UpdateCity::class)->middleware(['auth', 'verified'])->name('city.update');
    Route::delete('/dashboard/city/{city}', DeleteCity::class)->middleware(['auth', 'verified'])->name('city.delete');
});
