<?php

namespace App\Http\Controllers;

use App\Recette;
use Illuminate\Http\Request;
use App\Mail\RecetteCreated;

class RecettesController extends Controller
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
        // $recettes = \App\Recette::all();
        // $recettes = auth()->user()->recettes;
        // $recettes = Recette::where('owner_id', auth()->id())->get();
        // dump($recettes);
        // return $recettes;
        // return view('recettes.index', compact('recettes'));
        return view('recettes.index', [
            'recettes' => auth()->user()->recettes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recettes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return request()->all();
        // $attributes = request()->validate([
        //     'nom' => ['required', 'min:3'],
        //     'description' => ['required', 'min:3']
        // ]);
        $attributes = $this->validateRecette();
        $attributes['owner_id'] = auth()->id();
        // dd($attributes);
        // Recette::create(request(['nom', 'description']));
        // $recette = Recette::create($attributes);
        Recette::create($attributes);
        // $recette = new Recette();
        // $recette->nom = request('nom');
        // $recette->description = request('description');
        // $recette->save();
        
        // \Mail::to($recette->owner->email)->send(
        //     new RecetteCreated($recette)
        // );
        session()->flash('message', 'Votre recette a bien été enregistrée.');
        return redirect('/recettes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function show(Recette $recette)
    {
        // avec gestion des policies (php artisan make:policy RecettePolicy --model=Recette)
        $this->authorize('view', $recette);
        // abort_if(\Gate::denies('update', $recette), 403)
        // Sans gestion des policies :
        // abort_unless(auth()->user()->owns($recette), 403);
        // abort_if($recette->owner_id !== auth()->id(), 403);
        
        return view('recettes.show', compact('recette'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function edit(Recette $recette)
    {
        return view('recettes.edit', compact('recette'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recette $recette)
    {
        // Vérifie que l'utilisateur peut mettre à jour la recette
        $this->authorize('update', $recette);
        
        // Validation du formulaire
        // $attributes = request()->validate([
        //     'nom' => ['required', 'min:3'],
        //     'description' => ['required', 'min:3']
        // ]);
        
        // $recette->update($attributes);
        $recette->update($this->validateRecette());
        // $recette->update(request(['nom', 'description']));

        // $recette->nom = $request->nom;
        // $recette->description = $request->description;
        // $recette->save();

        return redirect('/recettes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recette $recette)
    {
        $recette->delete();
        return redirect('/recettes');
    }

    protected function validateRecette ()
    {

        return request()->validate([
            'nom' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);
    }
}
