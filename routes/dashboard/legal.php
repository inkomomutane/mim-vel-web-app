<?php

use App\Actions\Legal\GetPolicy;
use App\Actions\Legal\GetTermAndCondition;
use App\Actions\Legal\UpdatePolicy;
use App\Actions\Legal\UpdateTermAndCondition;

Route::get('dashboard/policy', GetPolicy::class)->middleware(['auth', 'verified'])->name('legal.policy');
Route::match(['put', 'patch'], 'dashboard/policy/update', UpdatePolicy::class)->middleware(['auth', 'verified'])->name('legal.policy.update');

Route::get('dashboard/terms', GetTermAndCondition::class)->middleware(['auth', 'verified'])->name('legal.term');
Route::match(['put', 'patch'], 'dashboard/terms/update', UpdateTermAndCondition::class)->middleware(['auth', 'verified'])->name('legal.term.update');
