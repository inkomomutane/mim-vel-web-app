<?php

namespace App\Actions\Message;

use App\Data\AgendaData;
use App\Models\Agenda;
use Auth;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetMessages
{
    use AsAction;
    use AsController;

    public function handle()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->hasAnyRole('Admin', 'Super-Admin')) {
            return AgendaData::collection(
                Agenda::with('imovel')->orderBy('is_readed', 'asc')->
            orderBy('updated_at', 'desc')->paginate(7));
        } else {
            return AgendaData::collection(
                Agenda::whereCorretorId(Auth::user()->id)->with('imovel')->orderBy('is_readed', 'asc')->
            orderBy('updated_at', 'desc')->paginate(7));
        }
    }

    public function asController()
    {
        return Inertia::render('Message/Index', [
            'messages' => $this->handle(),
        ]);
    }
}
