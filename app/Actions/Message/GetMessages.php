<?php

namespace App\Actions\Message;

use App\Data\AgendaData;
use App\Models\Agenda;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetMessages
{
    use AsAction;
    use AsController;

    public function handle()
    {
        return AgendaData::collection(Agenda::orderBy('is_readed', 'asc')->
        orderBy('updated_at', 'desc')->paginate(7));
    }

    public function asController()
    {
        return Inertia::render('Message/Index', [
            'messages' => $this->handle(),
        ]);
    }
}
