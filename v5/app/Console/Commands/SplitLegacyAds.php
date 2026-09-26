<?php

namespace App\Console\Commands;

use App\Models\Banner;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Throwable;

#[Signature('split:legacy-ads')]
#[Description('Split legacy ads into separate ad records')]
class SplitLegacyAds extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $ads = Banner::query()
            ->with('media')
            ->get();

        if ($ads->isEmpty()) {
            $this->info('No legacy ads were found.');

            return self::SUCCESS;
        }

        $mediaCount = $ads->sum(
            fn (Banner $ad) => $ad->media->count()
        );

        $this->warn('This operation will permanently modify legacy ads.');
        $this->line("Legacy banners: {$ads->count()}");
        $this->line("Media items to split: {$mediaCount}");
        $this->newLine();

        if (! $this->confirm(
            'Are you sure you want to split these legacy ads?',
            false
        )) {
            $this->warn('Operation cancelled.');

            return self::SUCCESS;
        }

        try {
            DB::transaction(function () use ($ads): void {
                $ids = $ads->pluck('id')->all();

                foreach ($ads as $ad) {
                    foreach ($ad->media as $media) {
                        $newAd = Banner::query()->create([
                            'ads_link' => '',
                            'type' => 'ads',
                            'ads_subtitle' => '',
                        ]);

                        $media->model_id = $newAd->id;
                        $media->save();
                    }
                }

                Banner::query()
                    ->whereIn('id', $ids)
                    ->delete();
            });

            $this->newLine();
            $this->info('Legacy ads were split successfully.');

            return self::SUCCESS;
        } catch (Throwable $exception) {
            $this->error('Failed to split legacy ads.');
            $this->error($exception->getMessage());

            return self::FAILURE;
        }
    }
}
