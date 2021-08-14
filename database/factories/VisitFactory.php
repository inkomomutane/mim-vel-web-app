<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\Visit::class, function (Faker $faker) {
    return [
        'primary_key' => $faker->word,
        'secondary_key' => $faker->word,
        'score' => $faker->randomNumber(),
        'list' => $faker->word,
        'expired_at' => $faker->dateTime(),
    ];
});
