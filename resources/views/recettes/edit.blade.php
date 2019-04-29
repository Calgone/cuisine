@extends('layout')

@section('content')
    <h1 class="title">Éditer la recette</h1>
    <form method="post" action="/recettes/{{ $recette->id }}" style="margin-bottom: 1em;">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="field">
            <label class="label" for="nom">Nom</label>
            <div class="control">
                <input type="text" class="input" name="nom" placeholder="nom" value="{{ $recette->nom }}" required>
            </div>
        </div>
        
        <div class="field">
            <label class="label" for="description">Description</label>
            <div class="control">
                <textarea name="description" class="textarea" id="description" cols="30" rows="10" required>{{ $recette->description }}</textarea>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Mise à jour</button>
            </div>
        </div>
    </form>

    @include('errors')
    
    <form method="post" action="/recettes/{{ $recette->id }}">
        @method('DELETE')
        @csrf
        <div class="field">
            <div class="control">
                <button type="submit" class="button">Supprimer</button>
            </div>
        </div>
    </form>
@endsection