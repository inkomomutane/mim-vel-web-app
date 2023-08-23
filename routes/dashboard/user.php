<?php

use App\Actions\User\CreateUser;
use App\Actions\User\DeleteUser;
use App\Actions\User\GetUsers;
use App\Actions\User\UpdateUser;

Route::middleware(['roles:Admin|Super-Admin|Sub-Admin|Agencia-imobiliaria', 'auth', 'verified'])->group(function () {
    Route::get('/dashboard/users', GetUsers::class)->name('user.all');
    Route::post('/dashboard/user', CreateUser::class)->name('user.store');
    Route::match(['put', 'patch'], '/dashboard/user/{user}', UpdateUser::class)->name('user.update');
    Route::delete('/dashboard/user/{user}', DeleteUser::class)->name('user.status');
});
