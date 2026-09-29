<?php

namespace App\Http\Controllers;

use App\Models\Icon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IconController
{
    public function index(Request $request): JsonResponse
    {
        $search = trim(
            (string) $request->string('search')
        );

        $source = $request->string('source')->toString();

        $icons = Icon::query()
            ->select([
                'id',
                'name',
                'slug',
                'source',
                'icon_node',
                'tags',
            ])
            ->where('is_available', true)

            ->when(
                $source,
                fn (Builder $query) =>
                $query->where('source', $source)
            )

            ->when(
                $search,
                function (Builder $query) use ($search) {
                    $search = mb_strtolower($search);

                    $query->where(
                        'search_text',
                        'like',
                        "%{$search}%"
                    );

                    /*
                     * Exact matches first,
                     * then prefix matches.
                     */
                    $query->orderByRaw(
                        <<<'SQL'
                            CASE
                                WHEN LOWER(slug) = ? THEN 0
                                WHEN LOWER(slug) LIKE ? THEN 1
                                ELSE 2
                            END
                        SQL,
                        [
                            $search,
                            "{$search}%",
                        ]
                    );
                }
            )

            /*
             * Prefer stable Lucide icons before Lab.
             */
            ->orderByRaw(
                <<<'SQL'
                    CASE
                        WHEN source = 'lucide' THEN 0
                        ELSE 1
                    END
                SQL
            )
            ->orderBy('name')
            ->paginate(
                perPage: min(
                    $request->integer('per_page', 80),
                    100
                )
            );

        return response()->json($icons);
    }

    public function show(Icon $icon): JsonResponse
    {
        return response()->json([
            'data' => $icon->only([
                'id',
                'name',
                'slug',
                'source',
                'icon_node',
                'tags',
            ]),
        ]);
    }
}
