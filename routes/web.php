<?php

use App\Http\Controllers\Backend\BairroController;
use App\Http\Controllers\Backend\CidadeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('website.welcome');
})->name('welcome');
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false
]);


Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('dashboard');

    Route::resource('user', \App\Http\Controllers\Backend\UserController::class);
    Route::resource('cidade', CidadeController::class);
    Route::resource('bairro', BairroController::class);


});
