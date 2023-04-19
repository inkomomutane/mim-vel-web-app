<?php

use App\Actions\Province\GetProvinces;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
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

Route::get('/', function () {
    $imovel = App\Models\Imovel::find(44)->load('media');
    return Inertia::render('Website/Welcome',[
        'imovel' => $imovel
    ]);
})->name('welcome');

Route::get('/dashboard', function () {  return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/dashboard/province.php';
