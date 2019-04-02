<?php

use Faker\Generator as Faker;

$factory->define(App\Likes::class, function (Faker $faker) {
    return [
        //
        'post_id' => $faker->randomDigit,
        'user_id' => $faker->randomDigit,
    ];
});
