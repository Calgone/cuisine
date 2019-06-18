<?php

use Faker\Generator as Faker;

$factory->define(
    App\Recipe::class,
    function (Faker $faker) {
        return [
            'owner_id' => factory(App\User::class),
            'title' => $faker->name,
            'description' => $faker->sentence(),
            'nb_people' => $faker->numberBetween(1, 12),
            'prep_minutes' => $faker->numberBetween(1, 120),
            'cook_minutes' => $faker->numberBetween(0, 240),
            'rest_minutes' => $faker->numberBetween(0, 120),
            'cost' => $faker->randomFloat(2, 1, 100),
            'difficulty' => $faker->numberBetween(1, 5),
            'img_path' => '/' 
                . implode('/', $faker->words($faker->numberBetween(0, 4))) 
                . $faker->word . '.' . $faker->lexify('???')
        ];
    }
);
