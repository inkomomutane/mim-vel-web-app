<?php

namespace App\Actions\Imovel;

use App\Http\Requests\UpdateImovelRequest;
use App\Models\Imovel;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateImovel
{
    use AsController;

    public function AsController(Imovel $imovel, UpdateImovelRequest $actionRequest)
    {
        $data = collect($actionRequest->all())
            ->put('published_at', now())
            ->except('images')->toArray();
        try {
            $imovel->update($data);
            if (request()->hasFile('images')) {
                foreach ($actionRequest->images as $image) {
                    $imovel->addMedia($image)->toMediaCollection('posts', 'posts');
                }
            }
            flash()->addSuccess('Imovel actualizado com sucesso.');

            return to_route($imovel->approved ? 'imovel.all' : 'imovel.not.approved.all');
        } catch (\Throwable $e) {
            throw $e;
            flash()->addError('Erro na actualização do imovel.');

            return back();
        }
    }
}
