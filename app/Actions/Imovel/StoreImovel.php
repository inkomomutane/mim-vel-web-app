<?php

namespace App\Actions\Imovel;

use App\Models\Imovel;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class StoreImovel
{
    use AsController;
    use AsAction;

    public function rules(): array
    {
        return [
            'titulo' => 'required|string|unique:imovels,titulo',
            'descricao' => 'string|nullable',
            'details' => 'string|nullable',
            'slug' => 'string|nullable',
            'banheiros' => 'numeric|nullable',
            'preco' => 'string|nullable',
            'ano' => 'numeric|nullable',
            'andares' => 'numeric|nullable',
            'area' => 'numeric|nullable',
            'quartos' => 'numeric|nullable',
            'suites' => 'numeric|nullable',
            'garagens' => 'numeric|nullable',
            'piscinas' => 'numeric|nullable',
            'endereco' => 'string|nullable',
            'mapa' => 'string|nullable',
            'published_at' => 'nullable',
            'views' => 'nullable|numeric',
            'bairro_id' => 'required|numeric',
            'condicao_id' => 'required|numeric',
            'tipo_de_imovel_id' => 'required|numeric',
            'status_id' => 'numeric|required',
            'corretor_id' => 'numeric|nullable',
            'imovel_for_id' => 'required|numeric',
            'regra_de_negocio_id' => 'required|numeric',
            'intermediation_rule_id' => 'required|numeric',
        ];
    }

    public function AsController(ActionRequest $actionRequest)
    {
        $data = collect($actionRequest->all())
            ->put('corretor_id', $actionRequest->user()->id)
            ->put('published_at', now())
            ->except('images')->toArray();
        try {
            $imovel = Imovel::create($data);
            if (request()->hasFile('images')) {
                foreach ($actionRequest->images as $image) {
                    $imovel->addMedia($image)->toMediaCollection('posts', 'posts');
                }
            }
            flash()->addSuccess('Imovel criado com sucesso.');

            return to_route('imovel.not.approved.all');
        } catch (\Throwable $e) {
            throw $e;
            flash()->addError('Erro na criação do imovel.');

            return back();
        }
    }
}
