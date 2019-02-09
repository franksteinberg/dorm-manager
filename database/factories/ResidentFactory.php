<?php

use Faker\Generator as Faker;

$factory->define(App\Resident::class, function (Faker $faker, $options) {
    $genders = [
        'M' => 'male',
        'F' => 'female',
    ];

    // Do not override gender if passed into the Factory. Otherwise, randomly choose.
    $gender = $options['gender'] ?? (rand(0, 1) ? 'M' : 'F');

    return [
        'first_name' => $faker->firstName($genders[$gender]),
        'last_name' => $faker->lastName,
        'address1' => $faker->streetAddress,
        'address2' => null,
        'gender' => $gender,
        'student_id' => $faker->uuid,
        'birth_date' => $faker->date(),
        'phone' => $faker->phoneNumber,
    ];
});
