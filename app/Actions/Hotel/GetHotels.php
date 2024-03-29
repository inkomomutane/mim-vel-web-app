<?php

namespace App\Actions\Hotel;

use App\Data\HotelMetaDataDtoData;
use App\Models\User;
use App\Support\Enums\SystemRoles;
use App\Support\Traits\GetHotelWithSearchScope;
use Auth;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;
use Spatie\LaravelData\CursorPaginatedDataCollection;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\PaginatedDataCollection;

class GetHotels
{
    use AsAction;
    use AsController;
    use GetHotelWithSearchScope;

    public function handle(?string $term, User $user): PaginatedDataCollection|CursorPaginatedDataCollection|DataCollection
    {
        if ($user->hasAnyRole(SystemRoles::SUPERADMIN, SystemRoles::ADMIN)) {
            return HotelMetaDataDtoData::collection(
                $this->getHotels($term)

                    ->paginate(5)->withQueryString()
            );
        }

        return abort(401);
    }

    public function AsController(): \Inertia\Response
    {
        return Inertia::render('Hotel/Index', [
            'hotels' => $this->handle(
                request()
                    ->search,
                Auth::user()
            ),
        ]);
    }
}
