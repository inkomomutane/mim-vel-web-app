<?php

use App\Actions\TranstionType\CreateTransactionType;
use App\Actions\TranstionType\DeleteTransactionType;
use App\Actions\TranstionType\GetTransactionTypes;
use App\Actions\TranstionType\UpdateTransactionType;

Route::middleware(['roles:Admin|Super-Admin', 'auth', 'verified'])->group(function () {
    Route::get('/dashboard/transaction-types', GetTransactionTypes::class)->name('transaction.type.all');
    Route::post('/dashboard/transaction-type', CreateTransactionType::class)->name('transaction.type.store');
    Route::match(['put', 'patch'], '/dashboard/transaction-type/{transactionType}', UpdateTransactionType::class)->name('transaction.type.update');
    Route::delete('/dashboard/transaction-type/{transactionType}', DeleteTransactionType::class)->name('transaction.type.delete');
});
