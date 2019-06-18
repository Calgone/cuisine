<?php

use App\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Voir https://en.wikibooks.org/wiki/Cookbook:Units_of_measurement
     * @return void
     */
    public function run()
    {
        DB::table('units')->truncate();

        Unit::create(
            [
                'id'        => 1,
                'category' => 'volume',
                'origin'   => 'us',
                'name'       => 'teaspoon',
                'short_name' => 'tsp'
            ]
        );
        Unit::create(
            [
                'id'        => 2,
                'category' => 'volume',
                'origin'   => 'us',
                'name'       => 'tablespoon',
                'short_name' => 'tbsp'
            ]
        );
        Unit::create(
            [
                'id'        => 3,
                'category' => 'volume',
                'origin'   => 'us',
                'name'       => 'fluid ounce',
                'short_name' => 'fl oz'
            ]
        );
        Unit::create(
            [
                'id'        => 4,
                'category' => 'volume',
                'origin'   => 'us',
                'name'       => 'gill',
                'short_name' => 'gill'
            ]
        );
        Unit::create(
            [
                'id'        => 5,
                'category' => 'volume',
                'origin'   => 'us',
                'name'       => 'cup',
                'short_name' => 'c'
            ]
        );
        Unit::create(
            [
                'id'        => 6,
                'category' => 'volume',
                'origin'   => 'us',
                'name'       => 'pint',
                'short_name' => 'pt'
            ]
        );
        Unit::create(
            [
                'id'        => 7,
                'category' => 'volume',
                'origin'   => 'us',
                'name'       => 'quart',
                'short_name' => 'qt'
            ]
        );
        Unit::create(
            [
                'id'        => 8,
                'category' => 'volume',
                'origin'   => 'us',
                'name'       => 'gallon',
                'short_name' => 'gal'
            ]
        );
        Unit::create(
            [
                'id'        => 9,
                'category' => 'volume',
                'origin'   => 'eu',
                'name'       => 'millilitre',
                'short_name' => 'ml'
            ]
        );
        Unit::create(
            [
                'id'        => 10,
                'category' => 'volume',
                'origin'   => 'us',
                'name'       => 'centilitre',
                'short_name' => 'cl'
            ]
        );
        Unit::create(
            [
                'id'        => 11,
                'category' => 'volume',
                'origin'   => 'eu',
                'name'       => 'décilitre',
                'short_name' => 'dl'
            ]
        );
        Unit::create(
            [
                'id'        => 12,
                'category' => 'volume',
                'origin'   => 'eu',
                'name'       => 'litre',
                'short_name' => 'l'
            ]
        );
        Unit::create(
            [
                'id'        => 13,
                'category' => 'poids',
                'origin'   => 'us',
                'name'       => 'pound',
                'short_name' => 'lb'
            ]
        );
        Unit::create(
            [
                'id'        => 14,
                'category' => 'poids',
                'origin'   => 'us',
                'name'       => 'ounce',
                'short_name' => 'oz'
            ]
        );
        Unit::create(
            [
                'id'        => 15,
                'category' => 'poids',
                'origin'   => 'eu',
                'name'       => 'milligramme',
                'short_name' => 'mg'
            ]
        );
        Unit::create(
            [
                'id'        => 16,
                'category' => 'poids',
                'origin'   => 'eu',
                'name'       => 'gramme',
                'short_name' => 'g'
            ]
        );
        Unit::create(
            [
                'id'        => 17,
                'category' => 'poids',
                'origin'   => 'eu',
                'name'       => 'kilogramme',
                'short_name' => 'kg'
            ]
        );
        Unit::create(
            [
                'id'        => 18,
                'category' => 'longueur',
                'origin'   => 'eu',
                'name'       => 'millimètre',
                'short_name' => 'mm'
            ]
        );
        Unit::create(
            [
                'id'        => 19,
                'category' => 'longueur',
                'origin'   => 'eu',
                'name'       => 'centimètre',
                'short_name' => 'cm'
            ]
        );
        Unit::create(
            [
                'id'        => 20,
                'category' => 'longueur',
                'origin'   => 'eu',
                'name'       => 'mètre',
                'short_name' => 'm'
            ]
        );
        Unit::create(
            [
                'id'        => 21,
                'category' => 'longueur',
                'origin'   => 'us',
                'name'       => 'inch',
                'short_name' => 'in'
            ]
        );
        Unit::create(
            [
                'id'        => 22,
                'category' => 'température',
                'origin'   => 'us',
                'name'       => 'Farenheit',
                'short_name' => '°F'
            ]
        );
        Unit::create(
            [
                'id'        => 23,
                'category' => 'température',
                'origin'   => 'fr',
                'name'       => 'Celsius',
                'short_name' => '°C'
            ]
        );
        Unit::create(
            [
                'id'        => 24,
                'category' => 'quantité',
                'origin'   => '',
                'name'       => 'quantité unitaire',
                'short_name' => 'nb'
            ]
        );
    }
}
