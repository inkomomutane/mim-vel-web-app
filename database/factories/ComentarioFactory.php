<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\Comentario::class, function (Faker $faker) {
    return [
        'ip' => $faker->word,
        'comentario' => $faker->word,
        'imovel_id' => factory(App\Models\Imovel::class),
    ];
});
