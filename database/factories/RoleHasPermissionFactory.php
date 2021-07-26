<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Models\RoleHasPermission::class, function (Faker $faker) {
    return [
        'permission_id' => factory(App\Models\Permission::class),
        'role_id' => factory(App\Models\Role::class),
    ];
});
