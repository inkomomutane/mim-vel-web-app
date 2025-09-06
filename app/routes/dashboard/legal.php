<?php

use App\Actions\Legal\GetPolicy;
use App\Actions\Legal\GetTermAndCondition;
use App\Actions\Legal\UpdatePolicy;
use App\Actions\Legal\UpdateTermAndCondition;

Route::middleware(['roles:Admin|Super-Admin', 'auth', 'verified'])->group(function () {
    Route::get('dashboard/policy', GetPolicy::class)->name('legal.policy');
    Route::match(['put', 'patch'], 'dashboard/policy/update', UpdatePolicy::class)->name('legal.policy.update');

    Route::get('dashboard/terms', GetTermAndCondition::class)->name('legal.term');
    Route::match(['put', 'patch'], 'dashboard/terms/update', UpdateTermAndCondition::class)->name('legal.term.update');
});
