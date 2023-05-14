<?php
use App\Actions\Website\GetPolicies;

Route::get('/politicas-de-privacidade',GetPolicies::class)->name('website.policy');

