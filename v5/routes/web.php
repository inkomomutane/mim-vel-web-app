<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {return Inertia::render('Web/Welcome');})->name('home');
Route::get('/dashboard',static  function () {
    return Inertia::render('Management/Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/me', function () { dd(auth()->user());})->name('me')->middleware('auth');
require_once  'settings.php';

