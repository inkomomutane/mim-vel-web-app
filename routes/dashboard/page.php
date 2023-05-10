<?php

use App\Actions\Page\GetPage;

Route::get('dashboard/mimovel', GetPage::class)->middleware(['auth', 'verified'])->name('mimovel');
