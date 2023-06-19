<?php

use App\Actions\Website\Welcome;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/',Welcome::class)->name('welcome');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

foreach (new FilesystemIterator(__DIR__.'/dashboard') as $fileinfo) {
    require $fileinfo->getPathname();
}

foreach (new FilesystemIterator(__DIR__.'/website') as $fileinfo) {
    require $fileinfo->getPathname();
}
