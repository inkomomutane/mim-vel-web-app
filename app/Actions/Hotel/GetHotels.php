<?php

namespace App\Actions\Hotel;

use App\Data\HotelData;
use App\Models\Hotel;
use App\Models\User;
use App\Support\Enums\SystemRoles;
use App\Support\Traits\GetHotelWithSearchScope;
use Auth;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetHotels
{
    use AsAction;
    use AsController;
    use GetHotelWithSearchScope;

    public function handle(?string $term, User $user)
    {
        if ($user->hasAnyRole(SystemRoles::SUPERADMIN, SystemRoles::ADMIN)) {
            return HotelData::collection(
                $this->getHotels($term)->paginate(5)->withQueryString()
            );
        } else {
            return abort(401);
        }
    }

    public function AsController()
    {
        return Inertia::render('Hotel/Index', [
            'hotels' => $this->handle(
                request()
                    ->search,
                Auth::user()
            )
        ]);
    }
}
