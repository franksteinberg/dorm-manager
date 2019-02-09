<?php

use Faker\Generator as Faker;

$factory->define(App\Bed::class, function (Faker $faker) {
    return [
        'number' => $faker->numberBetween(1, 2),
        'room_id' => function () {
            return factory(App\Room::class)->create()->id;
        },
        'resident_id' => null,
    ];
});
