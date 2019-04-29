<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    
    public function a_user_can_have_a_recette()
    {
        $user = factory('App\User')->create();
        $recette = $user->recettes()->create([
            'nom' => 'Acme',
            'description' => 'Recette'
        ]);
        $this->assertEquals('Acme', $recette->nom);
    }
}
