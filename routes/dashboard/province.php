<?php

use App\Actions\Province\CreateProvince;
use App\Actions\Province\GetProvinces;

Route::get('/dashboard/provinces',GetProvinces::class)->middleware(['auth', 'verified'])->name('province.all');
Route::post('/dashboard/province',CreateProvince::class)->middleware(['auth', 'verified'])->name('province.store');
