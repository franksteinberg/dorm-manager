<?php

use Faker\Generator as Faker;

$factory->define(App\Resident::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'address1' => $faker->streetAddress,
        'address2' => null,
        'gender' => rand(0,1) ? 'M' : 'F',
        'student_id' => $faker->uuid,
        'birth_date' => $faker->date(),
        'phone' => $faker->phoneNumber,
    ];
});
