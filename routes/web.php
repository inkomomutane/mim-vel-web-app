<?php

use App\Http\Controllers\BairroController;
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
    return view('frontend.welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/permission', 'RoleController@index')->name('permissions')->middleware('verified');
Route::resource('bairro', 'BairroController')->middleware('verified');
Route::resource('cidade', 'CidadeController')->middleware('verified');
Route::resource('status', 'StatusController')->middleware('verified');
Route::resource('tipodeimovel', 'TipoDeImovelController')->middleware('verified');
Route::resource('user', 'UserController');

Route::middleware(['auth', 'ceo'])->group(function () {

});
Route::middleware(['auth', 'admin'])->group(function () {

});
Route::middleware(['auth', 'corretor'])->group(function () {

});

/** */
