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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/permission', 'RoleController@index')->name('permissions');
Route::resource('bairro', 'BairroController');
Route::resource('cidade', 'CidadeController');
Route::resource('status', 'StatusController');
Route::resource('tipodeimovel', 'TipoDeImovelController');

Route::middleware(['auth', 'ceo'])->group(function () {

});
Route::middleware(['auth', 'admin'])->group(function () {

});
Route::middleware(['auth', 'corretor'])->group(function () {

});
