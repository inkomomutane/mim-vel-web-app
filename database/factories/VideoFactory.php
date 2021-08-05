<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\Video::class, function (Faker $faker) {
    return [
        'url' => $faker->url,
        'videoble_id' => $faker->randomNumber(),
        'videoble_type' => 'App\Models\Imovel',
    ];
});
