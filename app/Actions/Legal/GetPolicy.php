<?php

namespace App\Actions\Legal;

use App\Models\Politica;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetPolicy
{
    use AsAction;
    use AsController;

    public function handle()
    {
        if (Politica::first() == null) {
            Politica::create([
                'politicas' => '',
            ]);
        }

        return Politica::first()->getData();
    }

    public function asController()
    {
        return Inertia::render('Legal/Policy', [
            'policy' => $this->handle(),
        ]);
    }
}
