<?php

use Faker\Generator as Faker;

$factory->define(
    App\Etape::class,
    function (Faker $faker) {
        return [
            'description' => $faker->text(100),
            'order' => $faker->numberBetween(1, 10),
        ];
    }
);
