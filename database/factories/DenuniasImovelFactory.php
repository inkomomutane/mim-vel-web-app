<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\DenuniasImovel::class, function (Faker $faker) {
    return [
        'denuncia_id' => factory(App\Models\Denuncia::class),
        'imovel_id' => factory(App\Models\Imovel::class),
    ];
});
