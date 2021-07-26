<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'email_verified_at' => $faker->dateTime(),
        'password' => bcrypt($faker->password),
        'remember_token' => Str::random(10),
        'image_url' => $faker->text,
        'profile_url' => $faker->text,
    ];
});
