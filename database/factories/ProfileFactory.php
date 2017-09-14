<?php

use Faker\Generator as Faker;

$factory->define(\App\Profile::class, function (Faker $faker) {
    return [
        'bio' => $faker->paragraph,
        'twitter' => $faker->userName,
        'github' => $faker->userName,
        'user_id' => factory(\App\User::class),
    ];
});
