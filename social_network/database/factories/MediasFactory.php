<?php

use Faker\Generator as Faker;

$factory->define(App\Medias::class, function (Faker $faker) {
    return [
        //
        'post_id' => $faker->unique()->randomDigitNotNull,
        'user_id' => $faker->unique()->randomDigitNotNull,
        'type' => 0,
        'link' => $faker->url
    ];
});
