<?php

use App\Actions\ImovelType\CreateImovelType;
use App\Actions\ImovelType\DeleteImovelType;
use App\Actions\ImovelType\GetImovelTypes;
use App\Actions\ImovelType\UpdateImovelType;

Route::get('dashboard/imovel-type',GetImovelTypes::class)->name('imovel_type.all');
Route::post('dashboard/imovel-type/store',CreateImovelType::class)->name('imovel_type.store');
Route::delete('dashboard/imovel-type/delete/{imovelType}',DeleteImovelType::class)->name('imovel_type.delete');
Route::post('dashboard/imovel-type/update/{imovelType}',UpdateImovelType::class)->name('imovel_type.update');
