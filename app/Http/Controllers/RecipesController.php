<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use App\Mail\RecipeCreated;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    { 
        $this->middleware('auth'); // ->only([]) ou ->except([])
    }

    public function index()
    {
        // $recipes = \App\Recipe::all();
        // $recipes = auth()->user()->recipes;
        // $recipes = Recipe::where('owner_id', auth()->id())->get();
        // dump($recipes);
        // return $recipes;
        // return view('recipes.index', compact('recipes'));
        return view('recipes.index', [
            'recipes' => auth()->user()->recipes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return request()->all();
        // $attributes = request()->validate([
        //     'nom' => ['required', 'min:3'],
        //     'description' => ['required', 'min:3']
        // ]);
        $attributes = $this->validateRecipe();
        $attributes['owner_id'] = auth()->id();
        // dd($attributes);
        // Recipe::create(request(['nom', 'description']));
        // $recipe = Recipe::create($attributes);
        Recipe::create($attributes);
        // $recipe = new Recipe();
        // $recipe->nom = request('nom');
        // $recipe->description = request('description');
        // $recipe->save();
        
        // \Mail::to($recipe->owner->email)->send(
        //     new RecipeCreated($recipe)
        // );
        session()->flash('message', 'Votre recipe a bien été enregistrée.');
        return redirect('/recipes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        // avec gestion des policies (php artisan make:policy RecipePolicy --model=Recipe)
        $this->authorize('view', $recipe);
        // abort_if(\Gate::denies('update', $recipe), 403)
        // Sans gestion des policies :
        // abort_unless(auth()->user()->owns($recipe), 403);
        // abort_if($recipe->owner_id !== auth()->id(), 403);
        
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        // Vérifie que l'utilisateur peut mettre à jour la recipe
        $this->authorize('update', $recipe);
        
        // Validation du formulaire
        // $attributes = request()->validate([
        //     'nom' => ['required', 'min:3'],
        //     'description' => ['required', 'min:3']
        // ]);
        
        // $recipe->update($attributes);
        $recipe->update($this->validateRecipe());
        // $recipe->update(request(['nom', 'description']));

        // $recipe->nom = $request->nom;
        // $recipe->description = $request->description;
        // $recipe->save();

        return redirect('/recipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect('/recipes');
    }

    protected function validateRecipe ()
    {

        return request()->validate([
            'nom' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);
    }
}
