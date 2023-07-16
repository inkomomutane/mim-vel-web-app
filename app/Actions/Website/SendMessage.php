<?php

namespace App\Actions\Website;

use App\Mail\SendMessagesMail;
use App\Models\Agenda;
use App\Models\User;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;
use Mail;

class SendMessage
{
    use AsAction;
    use AsController;

    public function handle(Agenda $agenda): bool
    {
        try {
            Mail::to(config('MAIL_RECEIVER_EMAIL', 'nelsonmutane@gmail.com'))
                ->cc('nelsonmutane@gmail.com')
                ->send(new SendMessagesMail($agenda));

            return true;
        } catch (\Throwable $th) {
            throw $th;

            return false;
        }
    }

    public function rules(): array
    {
        return [
            'nome_do_cliente' => 'required|string|max:125',
            'email' => 'email|nullable',
            'contacto' => 'string|max:125|nullable',
            'mensagem' => 'required|string',
        ];
    }

    public function asController(ActionRequest $actionRequest)
    {
        $message = collect($actionRequest->all())
            ->put('corretor_id', User::first()->id)
            ->put('data_hora', now())
            ->put('imovel_id', null)->toArray();

        if ($this->handle(Agenda::create($message))) {
            return back()->with('success', 'A sua mensagem foi enviada com sucesso');
        }

        return back()->with('error', 'Erro ao envia sua mensagem, Tente mais tarde!');
    }
}
