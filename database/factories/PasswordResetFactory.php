<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\PasswordReset::class, function (Faker $faker) {
    return [
        'email' => $faker->safeEmail,
        'token' => $faker->word,
        'created_at' => $faker->dateTime(),
    ];
});
