<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'guard_name' => $faker->word,
    ];
});
