<?php

namespace App\Actions\Imovel;

use App\Actions\Website\SendMessage;
use App\Models\Agenda;
use App\Models\Imovel;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class SendMessageFromImovel
{
    use AsAction;
    use AsController;

    public function rules(): array
    {
        return [
            'nome_do_cliente' => 'required|string|max:125',
            'email' => 'email|nullable',
            'contacto' => 'string|max:125|nullable',
            'mensagem' => 'required|string',
        ];
    }

    public function asController(Imovel $imovel, ActionRequest $actionRequest)
    {
        $message = collect($actionRequest->all())
            ->put('corretor_id', $imovel->corretor_id)
            ->put('data_hora', now())
            ->put('imovel_id', $imovel->id)->toArray();
        if ((SendMessage::run(Agenda::create($message)))) {
            return back()->with('success', 'A sua mensagem foi enviada com sucesso');
        }

        return back()->with('error', 'Erro ao envia sua mensagem, Tente mais tarde!');
    }
}
