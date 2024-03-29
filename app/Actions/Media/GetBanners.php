<?php

namespace App\Actions\Media;

use App\Data\MediaData;
use App\Models\Banner;
use App\Support\Enums\SystemRoles;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetBanners
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

    public function handle()
    {
        if (Banner::first() == null) {
            Banner::create([]);
        }

        return MediaData::collection(
            Banner::first()->media()
                ->where('collection_name', 'banners')
                ->orderBy('updated_at', 'desc')
                ->paginate(3)
        );
    }

    public function asController()
    {
        return Inertia::render('Banner/Index', [
            'banners' => $this->handle(),
        ]);
    }
}
