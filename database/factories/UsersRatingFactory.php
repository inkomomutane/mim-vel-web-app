<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\UsersRating::class, function (Faker $faker) {
    return [
        'users_id' => factory(App\Models\User::class),
        'imovels_id' => factory(App\Models\Imovel::class),
        'rating' => $faker->randomFloat(),
    ];
});
