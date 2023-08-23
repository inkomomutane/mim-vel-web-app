<?php

namespace App\Actions\TranstionType;

use App\Models\ImovelFor;
use App\Support\Enums\SystemRoles;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateTransactionType
{
    use AsController;

    public function authorize(ActionRequest $request): bool
    {
        /** @var User $user */
        $user = $request->user();

        return $user->hasAnyRole(
            SystemRoles::SUPERADMIN,
            SystemRoles::ADMIN
        );
    }

    public function asController(ImovelFor $transactionType)
    {
        $validated = request()->validate([
            'name' => ['required',Rule::unique(ImovelFor::class,'name')->ignore($transactionType->id,'id')],
            'slug_text' => ['required',Rule::unique(ImovelFor::class,'slug_text')->ignore($transactionType->id,'id')],
        ]);

        try {
            $transactionType->name = $validated['name'];
            $transactionType->slug_text = $validated['slug_text'];
            $transactionType->save();
            flash()->addSuccess('Tipo de transação actualizada com sucesso.');
        } catch (\Throwable $th) {
            flash()->addError('Erro na actualização do tipo de transação.');
        }

        return \redirect()->back();
    }
}
