<?php

use App\Actions\Imovel\CommentImovel;
use App\Actions\Imovel\SendMessageFromImovel;
use App\Actions\Website\GetImovel;
use App\Actions\Website\GetImovels;

Route::get('todos-imoveis', GetImovels::class)->name('imoveis');
Route::get('imoveis-post/{imovel}', GetImovel::class)->name('post.imovel.show');
Route::post('imoveis-post-comentar/{imovel}', CommentImovel::class)->name('post.imovel.comment');
Route::post('imoveis-post-message/{imovel}', SendMessageFromImovel::class)->name('post.imovel.message');
