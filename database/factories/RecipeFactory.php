<?php

use Faker\Generator as Faker;

$factory->define(
    App\Recette::class,
    function (Faker $faker) {
        return [
            'owner_id' => factory(App\User::class),
            'nom' => $faker->name,
            'description' => $faker->sentence(),
            'nb_personnes' => $faker->numberBetween(1, 12),
            'prepa_minutes' => $faker->numberBetween(1, 120),
            'cuisson_minutes' => $faker->numberBetween(0, 240),
            'repos_minutes' => $faker->numberBetween(0, 120),
            'cout' => $faker->randomFloat(2, 1, 100),
            'difficulte' => $faker->numberBetween(1, 5),
            'img_path' => '/' 
                . implode('/', $faker->words($faker->numberBetween(0, 4))) 
                . $faker->word . '.' . $faker->lexify('???')
        ];
    }
);
