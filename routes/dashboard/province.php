<?php

use App\Actions\Province\CreateProvince;
use App\Actions\Province\DeleteProvince;
use App\Actions\Province\GetProvinces;
use App\Actions\Province\UpdateProvince;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/provinces', GetProvinces::class)->name('province.all');
    Route::post('/dashboard/province', CreateProvince::class)->name('province.store');
    Route::match(['put', 'patch'], '/dashboard/province/{province}', UpdateProvince::class)->name('province.update');
    Route::delete('/dashboard/province/{province}', DeleteProvince::class)->name('province.delete');
});
