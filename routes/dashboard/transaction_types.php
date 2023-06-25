<?php

use App\Actions\TranstionType\CreateTransactionType;
use App\Actions\TranstionType\DeleteTransactionType;
use App\Actions\TranstionType\GetTransactionTypes;
use App\Actions\TranstionType\UpdateTransactionType;

Route::middleware(['roles:Admin|Super-Admin'])->group(function () {
    Route::get('/dashboard/transaction-types', GetTransactionTypes::class)->middleware(['auth', 'verified'])->name('transaction.type.all');
    Route::post('/dashboard/transaction-type', CreateTransactionType::class)->middleware(['auth', 'verified'])->name('transaction.type.store');
    Route::match(['put', 'patch'], '/dashboard/transaction-type/{transactionType}', UpdateTransactionType::class)->middleware(['auth', 'verified'])->name('transaction.type.update');
    Route::delete('/dashboard/transaction-type/{transactionType}', DeleteTransactionType::class)->middleware(['auth', 'verified'])->name('transaction.type.delete');
});
