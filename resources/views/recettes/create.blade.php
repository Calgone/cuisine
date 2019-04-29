@extends('layout')

@section('content')
    <h1>Créer une nouvelle recette.</h1>
    <form method="post" action="/recettes">
        {{ csrf_field() }}
        <div class="field">
            <div class="control">
                <input 
                    type="text" 
                    class="input {{ $errors->has('nom') ? 'is-danger' : ''}}"
                    name="nom" 
                    placeholder="titre" 
                    value="{{ old('nom') }}" 
                    required>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <textarea 
                    name="description" id="description" 
                    class="textarea {{ $errors->has('description') ? 'is-danger' : ''}}"
                    cols="30" rows="10" 
                    required>{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Valider</button>
            </div>        
        </div>
        @include('errors')
    </form>
@endsection