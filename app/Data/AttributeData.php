<?php

namespace App\Data;

use App\Models\Attribute;
use Spatie\LaravelData\Lazy;

class AttributeData
{
public function __construct(
    public readonly ?int $id,
    public readonly string $name,
    public readonly string $description,
    public readonly Lazy|null|MediaData $image
)
{
}

public  static  function  fromModel(Attribute $attribute): AttributeData
{
    return new self(
        id: $attribute->id,name: $attribute->name, description: $attribute->description,
       image:  Lazy::whenLoaded('media', $attribute, fn () => ! is_null($attribute->getFirstMedia('attributes')) ?
            MediaData::fromModel($attribute->getFirstMedia('attributes')) :
            null)
    );

}
}
