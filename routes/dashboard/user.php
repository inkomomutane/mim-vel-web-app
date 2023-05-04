<?php

use App\Actions\User\CreateUser;
use App\Actions\User\DeleteUser;
use App\Actions\User\GetUsers;
use App\Actions\User\UpdateUser;

Route::get('/dashboard/users', GetUsers::class)->middleware(['auth', 'verified'])->name('user.all');
Route::post('/dashboard/user', CreateUser::class)->middleware(['auth', 'verified'])->name('user.store');
Route::match(['put', 'patch'], '/dashboard/user/{user}', UpdateUser::class)->middleware(['auth', 'verified'])->name('user.update');
Route::delete('/dashboard/user/{user}', DeleteUser::class)->middleware(['auth', 'verified'])->name('user.status');
