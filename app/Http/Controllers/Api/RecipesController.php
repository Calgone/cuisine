<?php
/**
 * 
 */
namespace App\Http\Controllers\Api;

use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Resources\RecipeCollection;
use App\Http\Resources\RecipeListResource;
use App\Http\Resources\RecipeResource;

/**
 * Controller pour les recettes
 * 
 * @author Gregory Lecubin <gregory.lecubin@gmail.com>
 * 
 */

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RecipeListResource::collection(Recipe::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request La requete
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Recipe $recipe La recette
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return new RecipeResource($recipe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request La requete
     * @param \App\Recipe             $recipe La recette
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $data = $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
            ]
        );

        $recipe->update($data);

        return new RecipeResource($recipe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Recipe $recipe La recette
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        // $recipe->steps()->delete();
        $recipe->delete();

        return response(null, 204);
    }
}
