<?php

use App\Actions\Province\CreateProvince;
use App\Actions\Province\DeleteProvince;
use App\Actions\Province\GetProvinces;
use App\Actions\Province\UpdateProvince;

Route::middleware(['roles:Admin|Super-Admin'])->group(function () {
    Route::get('/dashboard/provinces', GetProvinces::class)->middleware(['auth', 'verified'])->name('province.all');
    Route::post('/dashboard/province', CreateProvince::class)->middleware(['auth', 'verified'])->name('province.store');
    Route::match(['put', 'patch'], '/dashboard/province/{province}', UpdateProvince::class)->middleware(['auth', 'verified'])->name('province.update');
    Route::delete('/dashboard/province/{province}', DeleteProvince::class)->middleware(['auth', 'verified'])->name('province.delete');
});
