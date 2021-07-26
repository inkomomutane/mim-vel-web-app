<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\FailedJob::class, function (Faker $faker) {
    return [
        'connection' => $faker->text,
        'queue' => $faker->text,
        'payload' => $faker->text,
        'exception' => $faker->text,
        'failed_at' => $faker->dateTime(),
    ];
});
