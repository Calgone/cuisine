<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etape;
use App\Recette;

class RecetteEtapesController extends Controller
{
    public function store(Recette $recette)
    {
        // dd($recette);
        $attributes = request()->validate(['description' => ['required', 'min:3']]);
        $recette->addEtape($attributes);
        // Etape::create([
        //     'recette_id' => $recette->id,
        //     'description' => request('description'),
        //     'ordre' => 1        
        // ]);

        return back();
    }

    public function update(Etape $etape)
    {
        // $etape->complete(request()->has('complete'));
        $method = request()->has('complete') ? 'complete' : 'incomplete';
        $etape->$method();
        // dd(request()->all());
        // $etape->update([
        //     'complete' => request()->has('complete')
        // ]);

        return back();
    }
}
