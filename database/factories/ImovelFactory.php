<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\Imovel::class, function (Faker $faker) {
    return [
        'descricao' => $faker->text,
        'preco' => $faker->randomFloat(),
        'ano' => $faker->dateTime(),
        'andar' => $faker->randomNumber(),
        'area' => $faker->randomFloat(),
        'quartos' => $faker->randomNumber(),
        'suites' => $faker->randomNumber(),
        'garagens' => $faker->randomNumber(),
        'pcinas' => $faker->randomNumber(),
        'endereco' => $faker->text,
        'mapa' => $faker->text,
        'condicao_id' => factory(App\Models\Condicao::class),
        'bairro_id' => factory(App\Models\Bairro::class),
        'cidade_id' => factory(App\Models\Cidade::class),
        'tipo_de_imovel_id' => factory(App\Models\TipoDeImovel::class),
        'status_id' => factory(App\Models\Status::class),
        'views' => $faker->randomNumber(),
        'rating' => $faker->randomFloat(),
        'postado_por' => factory(App\Models\User::class),
    ];
});
