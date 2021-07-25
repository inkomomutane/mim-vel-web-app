<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\Foto::class, function (Faker $faker) {
    return [
        'url' => $faker->url,
        'imovel_id' => factory(App\Models\Imovel::class),
    ];
});
