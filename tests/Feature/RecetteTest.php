<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecetteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * 
     * A basic feature test example.
     *
     * @return void
     */
    public function un_user_peut_creer_une_recette()
    {
        // Empêcher Laravel d'attraper les exceptions 

        // $this->withoutExceptionHandling();

        // Given Je suis un utilisateur connecté
        $this->actingAs(factory('App\User')->create());

        // $response = $this->get('/');
        // When ils arrivent sur la page /create en passant les bonnes données
        $attributes = [
            'nom' => 'Acme',
            'description' => 'Une description'
        ];
        
        $this->post('/recettes', $attributes);
        // Then Il doit y avoir une nouvelle recette dans la DB
        // $response->assertStatus(200);
        $this->assertDatabaseHas('recettes', $attributes);
    }

    /**
     * @test
     * 
     */
    public function invite_ne_peut_pas_creer_de_recette()
    {
        // $this->withoutExceptionHandling();
        $attributes = [
            'nom' => 'Acme',
            'description' => 'Une description'
        ];
        
        $this->post('/recettes', $attributes)->assertRedirect('/login');
    }
}
