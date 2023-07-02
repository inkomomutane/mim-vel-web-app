<?php

use App\Actions\Website\GetImovel;
use App\Actions\Website\GetImovels;

Route::get('todos-imoveis', GetImovels::class)->name('imoveis');
Route::get('imoveis-post/{imovel}', GetImovel::class)->name('post.imovel.show');
