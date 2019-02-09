<?php

use Faker\Generator as Faker;

$factory->define(App\Unit::class, function (Faker $faker) {
    return [
        'building_id' => function () {
            return factory(App\Building::class)->create()->id;
        },
        'floor' => rand(1, 4),
        'gender' => null,
    ];
});
