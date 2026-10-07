<?php


use App\Http\Controllers\IntermediationRuleController;
use App\Http\Controllers\PropertyConditionController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyForController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\NeighborhoodController;

use App\Http\Controllers\Management\BusinessRule\DeleteBusinessRuleController;
use App\Http\Controllers\Management\BusinessRule\GetSelectedItemBusinessRuleController;
use App\Http\Controllers\Management\BusinessRule\ListBusinessRuleController;
use App\Http\Controllers\Management\BusinessRule\ListJsonBusinessRuleController;
use App\Http\Controllers\Management\BusinessRule\ShowJsonBusinessRuleController;
use App\Http\Controllers\Management\BusinessRule\StoreBusinessRuleController;
use App\Http\Controllers\Management\BusinessRule\UpdateBusinessRuleController;

use App\Http\Controllers\Management\City\DeleteCityController;
use App\Http\Controllers\Management\City\GetSelectedItemCityController;
use App\Http\Controllers\Management\City\ListCityController;
use App\Http\Controllers\Management\City\ListJsonCityController;
use App\Http\Controllers\Management\City\ShowJsonCityController;
use App\Http\Controllers\Management\City\StoreCityController;
use App\Http\Controllers\Management\City\UpdateCityController;


use App\Http\Controllers\Management\IntermediationRule\DeleteIntermediationRuleController;
use App\Http\Controllers\Management\IntermediationRule\GetSelectedItemIntermediationRuleController;
use App\Http\Controllers\Management\IntermediationRule\ListIntermediationRuleController;
use App\Http\Controllers\Management\IntermediationRule\ListJsonIntermediationRuleController;
use App\Http\Controllers\Management\IntermediationRule\ShowJsonIntermediationRuleController;
use App\Http\Controllers\Management\IntermediationRule\StoreIntermediationRuleController;
use App\Http\Controllers\Management\IntermediationRule\UpdateIntermediationRuleController;


use App\Http\Controllers\Management\Neighborhood\DeleteNeighborhoodController;
use App\Http\Controllers\Management\Neighborhood\GetSelectedItemNeighborhoodController;
use App\Http\Controllers\Management\Neighborhood\ListJsonNeighborhoodController;
use App\Http\Controllers\Management\Neighborhood\ListNeighborhoodController;
use App\Http\Controllers\Management\Neighborhood\ShowJsonNeighborhoodController;
use App\Http\Controllers\Management\Neighborhood\StoreNeighborhoodController;
use App\Http\Controllers\Management\Neighborhood\UpdateNeighborhoodController;


use App\Http\Controllers\Management\PropertyCondition\DeletePropertyConditionController;
use App\Http\Controllers\Management\PropertyCondition\GetSelectedItemPropertyConditionController;
use App\Http\Controllers\Management\PropertyCondition\ListJsonPropertyConditionController;
use App\Http\Controllers\Management\PropertyCondition\ListPropertyConditionController;
use App\Http\Controllers\Management\PropertyCondition\ShowJsonPropertyConditionController;
use App\Http\Controllers\Management\PropertyCondition\StorePropertyConditionController;
use App\Http\Controllers\Management\PropertyCondition\UpdatePropertyConditionController;


use App\Http\Controllers\Management\PropertyFor\DeletePropertyForController;
use App\Http\Controllers\Management\PropertyFor\GetSelectedItemPropertyForController;
use App\Http\Controllers\Management\PropertyFor\ListJsonPropertyForController;
use App\Http\Controllers\Management\PropertyFor\ListPropertyForController;
use App\Http\Controllers\Management\PropertyFor\ShowJsonPropertyForController;
use App\Http\Controllers\Management\PropertyFor\StorePropertyForController;
use App\Http\Controllers\Management\PropertyFor\UpdatePropertyForController;


use App\Http\Controllers\Management\Province\DeleteProvinceController;
use App\Http\Controllers\Management\Province\GetSelectedItemProvinceController;
use App\Http\Controllers\Management\Province\ListJsonProvinceController;
use App\Http\Controllers\Management\Province\ListProvinceController;
use App\Http\Controllers\Management\Province\ShowJsonProvinceController;
use App\Http\Controllers\Management\Province\StoreProvinceController;
use App\Http\Controllers\Management\Province\UpdateProvinceController;


use App\Http\Controllers\Management\Status\DeleteStatusController;
use App\Http\Controllers\Management\Status\GetSelectedItemStatusController;
use App\Http\Controllers\Management\Status\ListJsonStatusController;
use App\Http\Controllers\Management\Status\ListStatusController;
use App\Http\Controllers\Management\Status\ShowJsonStatusController;
use App\Http\Controllers\Management\Status\StoreStatusController;
use App\Http\Controllers\Management\Status\UpdateStatusController;


#### ==== CITY ==== ###
Route::prefix('management')
    ->name('management.')
    ->group(function () {
        Route::prefix('city')
            ->name('city.')
            ->group(function () {
                Route::get(
                    '/',
                    ListCityController::class
                )->name('list');

                Route::post(
                    '/',
                    StoreCityController::class
                )->name('store');

                Route::get(
                    '/json/list',
                    ListJsonCityController::class
                )->name('list.json');

                Route::get(
                    '/json/selected',
                    GetSelectedItemCityController::class
                )->name('selected.json');

                Route::get(
                    '/{city}/json',
                    ShowJsonCityController::class
                )->name('json');

                Route::patch(
                    '/{city}',
                    UpdateCityController::class
                )->name('update');

                Route::delete(
                    '/{city}',
                    DeleteCityController::class
                )->name('delete');
            });
    });

### ==== BUSINESS RULES ==== ###
Route::prefix('management')
    ->name('management.')
    ->group(function () {
        Route::prefix('business-rule')
            ->name('business-rule.')
            ->group(function () {
                Route::get(
                    '/',
                    ListBusinessRuleController::class
                )->name('list');

                Route::post(
                    '/',
                    StoreBusinessRuleController::class
                )->name('store');

                /*
                 * JSON / Async Select
                 *
                 * Keep static routes before /{businessRule}.
                 */
                Route::get(
                    '/json/list',
                    ListJsonBusinessRuleController::class
                )->name('list.json');

                Route::get(
                    '/json/selected',
                    GetSelectedItemBusinessRuleController::class
                )->name('selected.json');

                Route::get(
                    '/{businessRule}/json',
                    ShowJsonBusinessRuleController::class
                )->name('json');

                Route::patch(
                    '/{businessRule}',
                    UpdateBusinessRuleController::class
                )->name('update');

                Route::delete(
                    '/{businessRule}',
                    DeleteBusinessRuleController::class
                )->name('delete');
            });
    });


### === INTERMEDIATION RULES === ###
Route::prefix('management')
    ->name('management.')
    ->group(function () {
        Route::prefix('intermediation-rule')
            ->name('intermediation-rule.')
            ->group(function () {
                Route::get(
                    '/',
                    ListIntermediationRuleController::class
                )->name('list');

                Route::post(
                    '/',
                    StoreIntermediationRuleController::class
                )->name('store');

                Route::get(
                    '/json/list',
                    ListJsonIntermediationRuleController::class
                )->name('list.json');

                Route::get(
                    '/json/selected',
                    GetSelectedItemIntermediationRuleController::class
                )->name('selected.json');

                Route::get(
                    '/{intermediationRule}/json',
                    ShowJsonIntermediationRuleController::class
                )->name('json');

                Route::patch(
                    '/{intermediationRule}',
                    UpdateIntermediationRuleController::class
                )->name('update');

                Route::delete(
                    '/{intermediationRule}',
                    DeleteIntermediationRuleController::class
                )->name('delete');
            });
    });


### === NEIGHBORHOODS === ###
Route::prefix('management')
    ->name('management.')
    ->group(function () {
        Route::prefix('neighborhood')
            ->name('neighborhood.')
            ->group(function () {
                Route::get(
                    '/',
                    ListNeighborhoodController::class
                )->name('list');

                Route::post(
                    '/',
                    StoreNeighborhoodController::class
                )->name('store');

                Route::get(
                    '/json/list',
                    ListJsonNeighborhoodController::class
                )->name('list.json');

                Route::get(
                    '/json/selected',
                    GetSelectedItemNeighborhoodController::class
                )->name('selected.json');

                Route::get(
                    '/{neighborhood}/json',
                    ShowJsonNeighborhoodController::class
                )->name('json');

                Route::patch(
                    '/{neighborhood}',
                    UpdateNeighborhoodController::class
                )->name('update');

                Route::delete(
                    '/{neighborhood}',
                    DeleteNeighborhoodController::class
                )->name('delete');
            });
    });

### === PROPERTY CONDITIONS === #
Route::prefix('management')
    ->name('management.')
    ->group(function () {
        Route::prefix('property-condition')
            ->name('property-condition.')
            ->group(function () {
                Route::get(
                    '/',
                    ListPropertyConditionController::class
                )->name('list');

                Route::post(
                    '/',
                    StorePropertyConditionController::class
                )->name('store');

                Route::get(
                    '/json/list',
                    ListJsonPropertyConditionController::class
                )->name('list.json');

                Route::get(
                    '/json/selected',
                    GetSelectedItemPropertyConditionController::class
                )->name('selected.json');

                Route::get(
                    '/{propertyCondition}/json',
                    ShowJsonPropertyConditionController::class
                )->name('json');

                Route::patch(
                    '/{propertyCondition}',
                    UpdatePropertyConditionController::class
                )->name('update');

                Route::delete(
                    '/{propertyCondition}',
                    DeletePropertyConditionController::class
                )->name('delete');
            });
    });

### === PROPERTY FOR === ###
Route::prefix('management')
    ->name('management.')
    ->group(function () {
        Route::prefix('property-for')
            ->name('property-for.')
            ->group(function () {
                Route::get(
                    '/',
                    ListPropertyForController::class
                )->name('list');

                Route::post(
                    '/',
                    StorePropertyForController::class
                )->name('store');

                Route::get(
                    '/json/list',
                    ListJsonPropertyForController::class
                )->name('list.json');

                Route::get(
                    '/json/selected',
                    GetSelectedItemPropertyForController::class
                )->name('selected.json');

                Route::get(
                    '/{propertyFor}/json',
                    ShowJsonPropertyForController::class
                )->name('json');

                Route::patch(
                    '/{propertyFor}',
                    UpdatePropertyForController::class
                )->name('update');

                Route::delete(
                    '/{propertyFor}',
                    DeletePropertyForController::class
                )->name('delete');
            });
    });


### === PROVINCES === ###
Route::prefix('management')
    ->name('management.')
    ->group(function () {
        Route::prefix('province')
            ->name('province.')
            ->group(function () {
                Route::get(
                    '/',
                    ListProvinceController::class
                )->name('list');

                Route::post(
                    '/',
                    StoreProvinceController::class
                )->name('store');

                Route::get(
                    '/json/list',
                    ListJsonProvinceController::class
                )->name('list.json');

                Route::get(
                    '/json/selected',
                    GetSelectedItemProvinceController::class
                )->name('selected.json');

                Route::get(
                    '/{province}/json',
                    ShowJsonProvinceController::class
                )->name('json');

                Route::patch(
                    '/{province}',
                    UpdateProvinceController::class
                )->name('update');

                Route::delete(
                    '/{province}',
                    DeleteProvinceController::class
                )->name('delete');
            });
    });

### === STATUS === ###
Route::prefix('management')
    ->name('management.')
    ->group(function () {
        Route::prefix('status')
            ->name('status.')
            ->group(function () {
                Route::get(
                    '/',
                    ListStatusController::class
                )->name('list');

                Route::post(
                    '/',
                    StoreStatusController::class
                )->name('store');

                Route::get(
                    '/json/list',
                    ListJsonStatusController::class
                )->name('list.json');

                Route::get(
                    '/json/selected',
                    GetSelectedItemStatusController::class
                )->name('selected.json');

                Route::get(
                    '/{status}/json',
                    ShowJsonStatusController::class
                )->name('json');

                Route::patch(
                    '/{status}',
                    UpdateStatusController::class
                )->name('update');

                Route::delete(
                    '/{status}',
                    DeleteStatusController::class
                )->name('delete');
            });
    });


Route::prefix('core')
    ->name('core.')
    ->group(function (){
        Route::prefix('icons')
            ->name('icons.')
            ->controller(\App\Http\Controllers\IconController::class)
            ->group(function () {
                Route::get('/{icon}/json', 'show')
                    ->name('json');
                Route::get('/json/list', 'index')
                    ->name('list.json');
            });

    });
