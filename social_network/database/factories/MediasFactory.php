<?php

use Faker\Generator as Faker;

$factory->define(App\Medias::class, function (Faker $faker) {
    return [
        //
        'post_id' => $faker->randomDigit,
        'user_id' => $faker->randomDigit,
        'type' => 0,
        'link' => $faker->url
    ];
});
