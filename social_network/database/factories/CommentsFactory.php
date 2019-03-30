<?php

use Faker\Generator as Faker;

$factory->define(App\Comments::class, function (Faker $faker) {
    return [
        //
        'post_id' => $faker->randomDigit,
        'user_id' => $faker->randomDigit,
        'content' => $faker->text($maxNbChars = 200)
    ];
});
