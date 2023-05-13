<?php

use App\Actions\Page\GetPage;
use App\Actions\Page\PageUpdate;

Route::get('dashboard/mimovel', GetPage::class)->middleware(['auth', 'verified'])->name('mimovel');
Route::post('dashboard/mimovel/update', PageUpdate::class)->middleware(['auth', 'verified'])->name('mimovel.update');
