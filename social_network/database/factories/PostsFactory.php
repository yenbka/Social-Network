<?php

use Faker\Generator as Faker;

$factory->define(App\Posts::class, function (Faker $faker) {
    return [
        //
        'user_id' => $faker->unique()->randomDigitNotNull,
        'content' => $faker->text($maxNbChars = 200),
        'has_medias' => 0
    ];
});
