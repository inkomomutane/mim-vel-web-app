<?php

use App\Actions\Page\GetPage;
use App\Actions\Page\PageUpdate;

Route::middleware(['roles:Admin|Super-Admin', 'auth', 'verified'])->group(function () {
    Route::get('dashboard/mimovel', GetPage::class)->name('mimovel');
    Route::post('dashboard/mimovel/update', PageUpdate::class)->name('mimovel.update');
});
