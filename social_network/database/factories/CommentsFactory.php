<?php

use Faker\Generator as Faker;

$factory->define(App\Comments::class, function (Faker $faker) {
    return [
        //
        'post_id' => $faker->unique()->randomDigitNotNull,
        'user_id' => $faker->unique()->randomDigitNotNull,
        'content' => $faker->text($maxNbChars = 200)
    ];
});
