<?php

namespace App\Actions\IntermediationRule;

use App\Data\IntermediationRuleData;
use App\Models\IntermediationRule;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetIntermediationRules
{
    use AsController;
    use AsAction;

    public function handle(string $term = null)
    {
        $intermediations = IntermediationRule::query()
            ->when($term, function ($query, $search) {
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('code', 'like', '%'.$search.'%')
                    ->orWhere('percentage', 'like', '%'.$search.'%');
            })->orderBy('created_at', 'desc')->paginate(5)->withQueryString();

        return IntermediationRuleData::collection(
            $intermediations
        );
    }

    public function AsController()
    {
        return Inertia::render(
            'Intermediation/Index',
            [
                'intermediations' => $this->handle(request()->search),
            ]
        );
    }
}
