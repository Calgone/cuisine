@extends('layout')

@section('content')
    <h1 class="title">{{ $recette->nom }}</h1>
    <div class="content">
        {{ $recette->description }}
        <p>
            <a href="/recettes/{{ $recette->id }}/edit">Éditer la recette</a>
        </p>
    </div>
    
    @if ($recette->etapes->count())
    <div class="box">
        <ul>
        @foreach ($recette->etapes as $etape)
            <li>
                <form method="post" action="/etapes/{{ $etape->id }}">
                    @method('PATCH')
                    @csrf
                    <label class="checkbox {{ $etape->complete ? 'is-complete' : '' }}" for="complete">
                    <input type="checkbox" name="complete" onChange="this.form.submit()" {{ $etape->complete ? 'checked' : '' }}>
                    {{ $etape->description }}
                    </label>
                </form>
                
            </li>
        @endforeach
        </ul>
    </div>
    @endif
    {{-- Ajouter une étape --}}
    <div class="box">
        <form method="post" action="/recettes/{{ $recette->id }}/etapes">
        @csrf
            <div class="field">
                <label for="description" class="label">Nouvelle étape</label>
                <div class="control">
                    <textarea name="description" class="textarea" id="description" cols="30" rows="10" required></textarea>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link">Ajouter une étape</button>
                </div>
            </div>
            @include('errors')
        </form>
    </div>
@endsection