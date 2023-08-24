<?php

use App\Actions\City\CreateCity;
use App\Actions\City\DeleteCity;
use App\Actions\City\GetCities;
use App\Actions\City\UpdateCity;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/cities', GetCities::class)->name('city.all');
    Route::post('/dashboard/city', CreateCity::class)->name('city.store');
    Route::match(['put', 'patch'], '/dashboard/city/{city}', UpdateCity::class)->name('city.update');
    Route::delete('/dashboard/city/{city}', DeleteCity::class)->name('city.delete');
});
