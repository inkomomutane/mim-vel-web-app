<?php

use App\Actions\Website\About;
Route::get('sobre-nos',About::class )->name('website.about');
