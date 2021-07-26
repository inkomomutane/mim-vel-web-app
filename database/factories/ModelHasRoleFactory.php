<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\ModelHasRole::class, function (Faker $faker) {
    return [
        'role_id' => factory(App\Models\Role::class),
        'model_type' => $faker->word,
        'model_id' => $faker->randomNumber(),
    ];
});
