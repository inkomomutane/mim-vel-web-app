<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\WebLink::class, function (Faker $faker) {
    return [
        'url' => $faker->url,
        'icon' => $faker->word,
    ];
});
