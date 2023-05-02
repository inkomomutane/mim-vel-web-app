<?php

namespace App\Actions\Legal;

use App\Models\Termo;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetTermAndCondition
{
    use AsAction;
    use AsController;

    public function handle()
    {
        if (Termo::first() == null) {
            Termo::create([
                'termos' => '',
            ]);
        }

        return Termo::first()->getData();
    }

    public function asController()
    {
        return Inertia::render('Legal/Terms', [
            'term' => $this->handle(),
        ]);
    }
}
