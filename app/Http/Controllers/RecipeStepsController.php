<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Step;
use App\Recipe;

class RecipeStepsController extends Controller
{
    public function store(Recipe $recipe)
    {
        // dd($recipe);
        $attributes = request()->validate(['description' => ['required', 'min:3']]);
        $recipe->addStep($attributes);
        // Etape::create([
        //     'recipe_id' => $recipe->id,
        //     'description' => request('description'),
        //     'ordre' => 1        
        // ]);

        return back();
    }

    public function update(Step $step)
    {
        // $etape->complete(request()->has('complete'));
        $method = request()->has('complete') ? 'complete' : 'incomplete';
        $step->$method();
        // dd(request()->all());
        // $etape->update([
        //     'complete' => request()->has('complete')
        // ]);

        return back();
    }
}
