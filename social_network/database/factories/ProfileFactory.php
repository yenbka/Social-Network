<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
    	'about_me' => $faker->text(50),
        'birth_date' => $faker->date,
        'address' => $faker->address,
        'gender' => '1',
        'phone' => $faker->phoneNumber,
        'status' => '1',
        'avatar_path' => $faker->text(20),
        'header_path' => $faker->text(20)  
    ];
});
