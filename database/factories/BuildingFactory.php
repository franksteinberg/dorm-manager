<?php

use Faker\Generator as Faker;

$factory->define(App\Building::class, function (Faker $faker) {
    return [
        'name' => 'Dormitory ' . rand(0, 200),
        'address1' => $faker->streetAddress,
        'address2' => null,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip' => $faker->postcode,
        'phone' => $faker->phoneNumber,
    ];
});
