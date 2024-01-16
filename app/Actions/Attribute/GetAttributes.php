<?php

namespace App\Actions\Attribute;

use App\Data\AttributeData;
use App\Models\Attribute;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetAttributes
{
    use AsAction;
    use AsController;

    public function handle(?string $term = null)
    {

        $attributes = Attribute::query()
            ->when($term, function ($query, $search) {
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%')
                    ->with('media');
            })->with('media')->orderBy('created_at', 'desc')->paginate(5)->withQueryString();

        return AttributeData::collection(
            $attributes
        );
    }

    public function AsController(): \Inertia\Response
    {
        return Inertia::render('Attribute/Index', [
            'attributes' => $this->handle(request()->search),
        ]);
    }
}
