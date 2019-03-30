<?php

use Faker\Generator as Faker;

$factory->define(App\Hobbie::class, function (Faker $faker) {
    return [
       'hobbie'=> $faker->text(50),
       'movies'=> $faker->text(50),
       'books'=> $faker->text(50),
       'other'=> $faker->text(50)
    ];
});
