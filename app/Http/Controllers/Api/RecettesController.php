<?php
/**
 * 
 */
namespace App\Http\Controllers\Api;

use App\Recette;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Resources\RecetteCollection;
use App\Http\Resources\RecetteListResource;
use App\Http\Resources\RecetteResource;

/**
 * Controller pour les recettes
 * 
 * @author Gregory Lecubin <gregory.lecubin@gmail.com>
 * 
 */

class RecettesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RecetteListResource::collection(Recette::paginate(10));
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
     * @param \App\Recette $recette La recette
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Recette $recette)
    {
        return new RecetteResource($recette);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request La requete
     * @param \App\Recette             $recette La recette
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recette $recette)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Recette $recette La recette
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recette $recette)
    {
        //
    }
}
