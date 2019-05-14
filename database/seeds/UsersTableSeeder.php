<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * voir https://stackoverflow.com/questions/35449226/laravel-seeding-relationships
     * @return void
     */
    public function run()
    {
        DB::table('etapes')->delete();
        DB::table('recettes')->delete();
        DB::table('users')->delete();
        // factory(App\User::class, 50)->create();
        factory(
            App\User::class,
            10
        )->create()->each(
            function ($user) {
                // $user->recettes()->saveMany(factory(App\Recette::class, 5)->make());
                $this->createRecettesForUser($user->id);
            }
        );
    }

    private function createRecettesForUser($user_id)
    {
        $amount = random_int(0, 5);
        factory(App\Recette::class, $amount)->create(
            ['owner_id' => $user_id]
        )->each(
            function ($recette) {
                $this->createEtapeForRecette($recette->id);
            }
        );
    }

    private function createEtapeForRecette($recette_id)
    {
        $amount = random_int(1, 10);
        factory(App\Etape::class, $amount)->create(
            ['recette_id' => $recette_id]
        );
    }
}
