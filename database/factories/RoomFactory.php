<?php

use Faker\Generator as Faker;

$factory->define(App\Room::class, function (Faker $faker) {
    return [
        'number' => $faker->numberBetween(1, 4),
        'unit_id' => function () {
            return factory(App\Unit::class)->create()->id;
        },
    ];
});
