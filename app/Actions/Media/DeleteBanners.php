<?php

namespace App\Actions\Media;

use App\Support\Enums\SystemRoles;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DeleteBanners
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

    public function AsController(Media $media)
    {
        try {
            $media->delete();
            flash()->addSuccess('Banner deletado com sucesso.');
        } catch (\Throwable $th) {
            flash()->addError('Erro ao deletar banner!');
        }

        return redirect()->back();
    }
}
