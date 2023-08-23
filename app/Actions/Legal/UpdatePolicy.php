<?php

namespace App\Actions\Legal;

use App\Data\PolicyData;
use App\Models\Politica;
use App\Support\Enums\SystemRoles;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class UpdatePolicy
{
    use AsAction;
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

    public function handle(PolicyData $policy)
    {
        try {
            $politica = Politica::first();
            $politica->politicas = $policy->politicas;
            $politica->save();
            flash()->addSuccess('Politicas de privacidade actualizadas com sucesso.');

            return $politica->getData();
        } catch (\Throwable $e) {
            flash()->addError('Erro na actualização de politicas de privacidade.');

            return $politica->getData();
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'politicas' => 'string|nullable',
        ];
    }

    public function asController(ActionRequest $actionRequest)
    {
        $this->handle(new PolicyData($actionRequest->politicas));

        return redirect()->back();
    }
}
