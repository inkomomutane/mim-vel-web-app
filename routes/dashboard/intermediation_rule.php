<?php

use App\Actions\IntermediationRule\CreateIntermediationRule;
use App\Actions\IntermediationRule\DeleteIntermediationRule;
use App\Actions\IntermediationRule\GetIntermediationRules;
use App\Actions\IntermediationRule\UpdateIntermediationRule;

Route::prefix('dashboard/')->group(function () {
    Route::get('/intermediation', GetIntermediationRules::class)->name('intermediation.all');
    Route::post('/intermediation/store', CreateIntermediationRule::class)->name('intermediation.store');
    Route::match(['put', 'patch'], '/intermediation/{intermediation}/update', UpdateIntermediationRule::class)->name('intermediation.update');
    Route::delete('/intermediation/{intermediation}', DeleteIntermediationRule::class)->name('intermediation.delete');
});
