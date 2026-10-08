<?php

namespace App\Http\Controllers\Website;

use App\Models\City;
use App\Models\Neighborhood;
use App\Models\Property;
use App\Models\Province;
use Inertia\Inertia;

class ShowPropertyController
{
     public function __invoke(
         Province $province,
         City   $city,
         Neighborhood $neighborhood,
         Property $property
     )
     {
         return Inertia::render('Web/Property/Show');
     }
}
