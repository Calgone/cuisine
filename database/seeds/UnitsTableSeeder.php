<?php

use App\Unite;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Voir https://en.wikibooks.org/wiki/Cookbook:Units_of_measurement
     * @return void
     */
    public function run()
    {
        DB::table('units')->truncate();

        Unite::create(
            [
                'id'        => 1,
                'categorie' => 'volume',
                'origine'   => 'us',
                'nom'       => 'teaspoon',
                'nom_court' => 'tsp'
            ]
        );
        Unite::create(
            [
                'id'        => 2,
                'categorie' => 'volume',
                'origine'   => 'us',
                'nom'       => 'tablespoon',
                'nom_court' => 'tbsp'
            ]
        );
        Unite::create(
            [
                'id'        => 3,
                'categorie' => 'volume',
                'origine'   => 'us',
                'nom'       => 'fluid ounce',
                'nom_court' => 'fl oz'
            ]
        );
        Unite::create(
            [
                'id'        => 4,
                'categorie' => 'volume',
                'origine'   => 'us',
                'nom'       => 'gill',
                'nom_court' => 'gill'
            ]
        );
        Unite::create(
            [
                'id'        => 5,
                'categorie' => 'volume',
                'origine'   => 'us',
                'nom'       => 'cup',
                'nom_court' => 'c'
            ]
        );
        Unite::create(
            [
                'id'        => 6,
                'categorie' => 'volume',
                'origine'   => 'us',
                'nom'       => 'pint',
                'nom_court' => 'pt'
            ]
        );
        Unite::create(
            [
                'id'        => 7,
                'categorie' => 'volume',
                'origine'   => 'us',
                'nom'       => 'quart',
                'nom_court' => 'qt'
            ]
        );
        Unite::create(
            [
                'id'        => 8,
                'categorie' => 'volume',
                'origine'   => 'us',
                'nom'       => 'gallon',
                'nom_court' => 'gal'
            ]
        );
        Unite::create(
            [
                'id'        => 9,
                'categorie' => 'volume',
                'origine'   => 'eu',
                'nom'       => 'millilitre',
                'nom_court' => 'ml'
            ]
        );
        Unite::create(
            [
                'id'        => 10,
                'categorie' => 'volume',
                'origine'   => 'us',
                'nom'       => 'centilitre',
                'nom_court' => 'cl'
            ]
        );
        Unite::create(
            [
                'id'        => 11,
                'categorie' => 'volume',
                'origine'   => 'eu',
                'nom'       => 'décilitre',
                'nom_court' => 'dl'
            ]
        );
        Unite::create(
            [
                'id'        => 12,
                'categorie' => 'volume',
                'origine'   => 'eu',
                'nom'       => 'litre',
                'nom_court' => 'l'
            ]
        );
        Unite::create(
            [
                'id'        => 13,
                'categorie' => 'poids',
                'origine'   => 'us',
                'nom'       => 'pound',
                'nom_court' => 'lb'
            ]
        );
        Unite::create(
            [
                'id'        => 14,
                'categorie' => 'poids',
                'origine'   => 'us',
                'nom'       => 'ounce',
                'nom_court' => 'oz'
            ]
        );
        Unite::create(
            [
                'id'        => 15,
                'categorie' => 'poids',
                'origine'   => 'eu',
                'nom'       => 'milligramme',
                'nom_court' => 'mg'
            ]
        );
        Unite::create(
            [
                'id'        => 16,
                'categorie' => 'poids',
                'origine'   => 'eu',
                'nom'       => 'gramme',
                'nom_court' => 'g'
            ]
        );
        Unite::create(
            [
                'id'        => 17,
                'categorie' => 'poids',
                'origine'   => 'eu',
                'nom'       => 'kilogramme',
                'nom_court' => 'kg'
            ]
        );
        Unite::create(
            [
                'id'        => 18,
                'categorie' => 'longueur',
                'origine'   => 'eu',
                'nom'       => 'millimètre',
                'nom_court' => 'mm'
            ]
        );
        Unite::create(
            [
                'id'        => 19,
                'categorie' => 'longueur',
                'origine'   => 'eu',
                'nom'       => 'centimètre',
                'nom_court' => 'cm'
            ]
        );
        Unite::create(
            [
                'id'        => 20,
                'categorie' => 'longueur',
                'origine'   => 'eu',
                'nom'       => 'mètre',
                'nom_court' => 'm'
            ]
        );
        Unite::create(
            [
                'id'        => 21,
                'categorie' => 'longueur',
                'origine'   => 'us',
                'nom'       => 'inch',
                'nom_court' => 'in'
            ]
        );
        Unite::create(
            [
                'id'        => 22,
                'categorie' => 'température',
                'origine'   => 'us',
                'nom'       => 'Farenheit',
                'nom_court' => '°F'
            ]
        );
        Unite::create(
            [
                'id'        => 23,
                'categorie' => 'température',
                'origine'   => 'fr',
                'nom'       => 'Celsius',
                'nom_court' => '°C'
            ]
        );
        Unite::create(
            [
                'id'        => 24,
                'categorie' => 'quantité',
                'origine'   => '',
                'nom'       => 'quantité unitaire',
                'nom_court' => 'nb'
            ]
        );
    }
}
