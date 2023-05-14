<?php

use Inertia\Inertia;

Route::get('sobre-nos',fn() => Inertia::render('Website/About'))->name('website.about');
