<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class SyncIcons extends Command
{
    protected $signature = 'icons:sync';

    protected $description = 'Synchronise Lucide and Lucide Lab icons with the database';

    public function handle(): int
    {
        $path = resource_path(
            'data/lucide-icons.json'
        );

        if (! file_exists($path)) {
            throw new RuntimeException(
                "Icon catalogue not found: {$path}"
            );
        }

        $contents = file_get_contents($path);

        $icons = json_decode(
            $contents,
            true,
            flags: JSON_THROW_ON_ERROR
        );

        DB::transaction(function () use ($icons) {
            /*
             * Do not delete old icons.
             *
             * Something in the ERP may already
             * reference them.
             */
            DB::table('icons')
                ->update([
                    'is_available' => false,
                ]);

            foreach (array_chunk($icons, 250) as $chunk) {
                $now = now();

                $rows = array_map(
                    static fn (array $icon) => [
                        'name' => $icon['name'],
                        'slug' => $icon['slug'],
                        'source' => $icon['source'],

                        'icon_node' => json_encode(
                            $icon['icon_node'],
                            JSON_THROW_ON_ERROR
                        ),

                        'tags' => json_encode(
                            $icon['tags'] ?? [],
                            JSON_THROW_ON_ERROR
                        ),

                        'search_text' => $icon['search_text'],

                        'is_available' => true,

                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    $chunk
                );

                DB::table('icons')->upsert(
                    $rows,
                    [
                        'source',
                        'slug',
                    ],
                    [
                        'name',
                        'icon_node',
                        'tags',
                        'search_text',
                        'is_available',
                        'updated_at',
                    ]
                );
            }
        });

        $this->info(
            sprintf(
                '%d icons synchronised.',
                count($icons)
            )
        );

        return self::SUCCESS;
    }
}
