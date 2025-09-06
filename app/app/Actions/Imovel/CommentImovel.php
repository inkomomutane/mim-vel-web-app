<?php

namespace App\Actions\Imovel;

use App\Models\Imovel;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class CommentImovel
{
    use AsController;

    public function rules(): array
    {
        return [
            'nome' => ['nullable', 'string', 'max:125'],
            'comentario' => ['nullable', 'string', 'max:125'],
        ];
    }

    public function asController(Imovel $imovel, ActionRequest $actionRequest)
    {
        try {
            $imovel->comentarios()->create($actionRequest->all());

            return back()->with('success', 'Comentário enviado com sucesso')->withHeaders(['#comments']);
        } catch (\Throwable $th) {
            return back()->with('error', 'Erro ao enviar seu comentário, tente novamente')->withHeaders(['#comments']);
        }
    }
}
