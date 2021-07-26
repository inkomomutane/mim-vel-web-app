<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\ModelHasPermission::class, function (Faker $faker) {
    return [
        'permission_id' => factory(App\Models\Permission::class),
        'model_type' => $faker->word,
        'model_id' => $faker->randomNumber(),
    ];
});
