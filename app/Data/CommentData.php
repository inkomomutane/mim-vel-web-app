<?php

namespace App\Data;

use App\Models\Comment;
use App\Models\Property;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class CommentData extends Data
{
    public function __construct(
        public ?int $id,
        public ?string $comment,
        public ?string $name,
        public ?string $ip,
        public int $property_id,
    ) {
    }

    public static function fromModel(
        Comment $comment,
    ): self {
        return new self(
            id: $comment->id,
            comment: $comment->comment,
            name: $comment->name,
            ip: $comment->ip,
            property_id: $comment->property_id,
        );
    }

    public static function rules(): array
    {
        return [
            'id' => [
                'nullable',
                'integer',
            ],

            'comment' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'ip' => [
                'nullable',
                'ip',
                'max:45',
            ],

            'property_id' => [
                'required',
                'integer',
                Rule::exists(Property::class, 'id'),
            ],
        ];
    }
}
