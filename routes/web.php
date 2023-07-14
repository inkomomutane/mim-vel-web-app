<?php

use App\Actions\Website\GetImovels;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::get('todos-imoveis', GetImovels::class)->name('imoveis');

foreach (new FilesystemIterator(__DIR__.'/dashboard') as $fileinfo) {
    require $fileinfo->getPathname();
}
