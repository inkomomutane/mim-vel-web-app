<?php

namespace App\Actions\Hotel;

use App\Models\Hotel;
use App\Models\HotelMetaData;
use DB;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateHotel
{
    use AsController;


    public function asController(HotelMetaData $hotel, ActionRequest $actionRequest): \Illuminate\Http\RedirectResponse
    {
        $validated = request()?->validate([
            'nome' => ['required|string', Rule::unique(HotelMetaData::class, 'title')->ignore($hotel->id, 'id')],
            'description' => 'string|nullable',
            'address' => 'string|nullable',
            'bairro_id' => 'required|numeric',
            'condicao_id' => 'required|numeric',
            'tipo_de_imovel_id' => 'required|numeric',
            'status_id' => 'numeric|required',
        ]);
        try {
            DB::beginTransaction();
            $hotel->update($validated);
            if ($actionRequest['images'] && is_array($actionRequest['images'])) {
                foreach ($actionRequest['images'] as $image) {
                    $hotel->addMedia($image)->toMediaCollection('main_hotels', 'hotels');
                }
            }
            DB::commit();
            flash()->addSuccess('Hotel actualizado com sucesso.');
            return to_route('hotel.all');
        } catch (\Throwable $e) {
            throw $e;
            flash()->addError('Erro na actualização do Hotel.');
            return back();
        }
    }
}
