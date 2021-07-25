<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\Denuncia::class, function (Faker $faker) {
    return [
        'denuncia' => $faker->text,
        'nome_do_denunciante' => $faker->word,
        'anonimo' => $faker->boolean,
        'email' => $faker->safeEmail,
        'contacto' => $faker->word,
    ];
});
