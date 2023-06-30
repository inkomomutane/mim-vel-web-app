<?php

use App\Actions\Website\GetImovels;

Route::get('todos-imoveis', GetImovels::class)->name('imoveis');
Route::get('imoveis-post/{imovel}', GetImovels::class)->name('post.imovel.show');
