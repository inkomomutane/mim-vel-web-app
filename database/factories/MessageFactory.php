<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\Message::class, function (Faker $faker) {
    return [
        'from_id' => $faker->numberBetween(1,4),
        'to_id' => $faker->numberBetween(1,4),
        'message' => $faker->word,
        'readed' => $faker->boolean,
    ];
});
