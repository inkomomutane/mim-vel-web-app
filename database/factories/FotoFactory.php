<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\Foto::class, function (Faker $faker) {
    return [
        'url' => $faker->imageUrl(),
        'fotable_id' => $faker->numberBetween(0,15),
        'fotable_type' => 'App\Models\Imovel',
    ];
});
