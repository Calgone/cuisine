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
        DB::table('steps')->delete();
        DB::table('recipes')->delete();
        DB::table('users')->delete();
        // factory(App\User::class, 50)->create();
        factory(
            App\User::class,
            10
        )->create()->each(
            function ($user) {
                // $user->recettes()->saveMany(factory(App\Recette::class, 5)->make());
                $this->createRecipesForUser($user->id);
            }
        );
    }

    private function createRecipesForUser($user_id)
    {
        $amount = random_int(0, 5);
        factory(App\Recipe::class, $amount)->create(
            ['owner_id' => $user_id]
        )->each(
            function ($recipe) {
                $this->createStepForRecipe($recipe->id);
            }
        );
    }

    private function createStepForRecipe($recipe_id)
    {
        $amount = random_int(1, 10);
        factory(App\Step::class, $amount)->create(
            ['recipe_id' => $recipe_id]
        );
    }
}
