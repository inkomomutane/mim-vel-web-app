<?php

namespace App\Actions\Message;

use App\Models\Agenda;
use Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class MessageCount
{
    use AsAction;

    public function handle(): int
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        if (is_null($user)) {
            return 0;
        }
        if ($user->hasAnyRole('Admin', 'Super-Admin')) {
            return Agenda::whereIsReaded(false)->count();
        } else {
            return Agenda::whereCorretorId($user->id)->whereIsReaded(false)->count();
        }
    }
}
