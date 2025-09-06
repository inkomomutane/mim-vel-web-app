<?php

namespace App\Actions\Attribute;

use App\Models\Attribute;
use App\Support\Enums\SystemRoles;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class UploadAttributeImage
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

    public function rules(): array
    {
        return [
            'image' => 'required',
        ];
    }

    public function asController(Attribute $attribute, ActionRequest $actionRequest): \Illuminate\Http\RedirectResponse
    {

        try {

            if ($actionRequest->hasFile('image') && count($actionRequest->image) > 0) {

                $attribute->addMedia($actionRequest->image[0])
                    ->withResponsiveImages()
                    ->toMediaCollection('attributes', 'attributes');
            }

            flash()->addSuccess('Imagem carregada com sucesso');
        } catch (\Throwable $th) {

            flash()->addError('Erro ao carregar imagem');
        }

        return \redirect()->back();
    }
}
