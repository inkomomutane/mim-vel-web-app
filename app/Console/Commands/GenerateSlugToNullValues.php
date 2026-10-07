<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Country;
use App\Models\Neighborhood;
use App\Models\Province;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('generate:slugs')]
#[Description('Generate slugs for records where the slug is null')]
class GenerateSlugToNullValues extends Command
{
    /**
     * @var array<class-string<Country|Province|City|Neighborhood>>
     */
    private const array MODELS = [
        Country::class,
        Province::class,
        City::class,
        Neighborhood::class,
    ];

    public function handle(): int
    {
        foreach (self::MODELS as $modelClass) {
            $modelClass::query()
                ->select(['id', 'name', 'slug'])
                ->whereNull('slug')
                ->lazyById()
                ->each(function ($model): void {
                    $model->generateSlug();
                    $model->update();
                });
        }

        $this->info('Slugs generated successfully.');
        return self::SUCCESS;
    }
}
