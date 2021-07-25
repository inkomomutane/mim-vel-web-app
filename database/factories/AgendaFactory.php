<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\Agenda::class, function (Faker $faker) {
    return [
        'nome_cliente' => $faker->word,
        'contacto' => $faker->word,
        'horario' => $faker->dateTime(),
        'local_de_encontro' => $faker->word,
        'corretor_id' => factory(App\Models\User::class),
    ];
});
