<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'email_verified_at' => $faker->dateTime(),
        'password' => Hash::make('password'),
        'remember_token' => Str::random(10),
        'profile_url' => $faker->url,
    ];
});
