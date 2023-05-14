<?php

use App\Actions\Website\GetTerms;

Route::get('/termos-e-condicoes',GetTerms::class)->name('website.terms');
