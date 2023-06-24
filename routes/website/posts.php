<?php

use App\Actions\Website\GetImovels;

Route::get('todos-imoveis',GetImovels::class)->name('imoveis');
