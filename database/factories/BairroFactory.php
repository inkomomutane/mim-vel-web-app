<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\Bairro::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
    ];
});
