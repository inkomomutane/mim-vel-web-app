<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\Comentario::class, function (Faker $faker) {
    return [
        'ip' => $faker->ipv4,
        'comentario' => $faker->word,
        'imovel_id' => $faker->numberBetween(0,15),
    ];
});
