<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Date;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\Imovel::class, function (Faker $faker) {
    return [
        'titulo' => $faker->word,
        'descricao' => $faker->word,
        'banheiros' => $faker->randomNumber(),
        'preco' => $faker->randomFloat(),
        'ano' => Date::now(),
        'andar' => $faker->randomNumber(),
        'area' => $faker->randomFloat(),
        'quartos' => $faker->randomNumber(),
        'suites' => $faker->randomNumber(),
        'garagens' => $faker->randomNumber(),
        'piscinas' => $faker->randomNumber(),
        'endereco' => $faker->text,
        'mapa' => $faker->text,
        'published' => $faker->boolean,
        'condicao_id' => $faker->numberBetween(4,15),
        'bairro_id' => $faker->numberBetween(4,15),
        'cidade_id' => $faker->numberBetween(4,15),
        'tipo_de_imovel_id' => $faker->numberBetween(4,15),
        'status_id' => $faker->numberBetween(4,15),
        'views' => $faker->randomNumber(),
        'rating' => $faker->randomFloat(),
        'postado_por' => $faker->numberBetween(4,15),
    ];
});
