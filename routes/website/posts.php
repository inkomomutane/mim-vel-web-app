<?php

use App\Actions\Website\GetImovels;

Route::get('posts',GetImovels::class)->name('posts');
