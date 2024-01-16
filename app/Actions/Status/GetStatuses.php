<?php

namespace App\Actions\Status;

use App\Data\StatusData;
use App\Models\Status;
use App\Support\Enums\SystemRoles;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetStatuses
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

    public function handle(?string $term = null)
    {
        return StatusData::collection(
            Status::query()
                ->when($term, function ($query, $search) {
                    $query->where('nome', 'like', '%'.$search.'%');
                })->
            orderBy('created_at', 'desc')->paginate(5)->withQueryString()
        );
    }

    public function AsController(): \Inertia\Response
    {
        return Inertia::render('Status/Index', [
            'statuses' => $this->handle(request()->search),
        ]);
    }
}
