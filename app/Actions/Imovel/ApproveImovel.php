<?php

namespace App\Actions\Imovel;

use App\Models\Imovel;
use Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class ApproveImovel
{
    use AsAction;

    public function handle(Imovel $imovel): bool
    {
        try {
            $imovel->approved = true;
            $imovel->approved_by_id = Auth::user()->id;
            $imovel->approved_at = now();
            $imovel->save();

            return true;

        } catch (\Throwable $th) {

            return false;
        }

        return false;
    }
}
