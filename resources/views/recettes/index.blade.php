@extends('layout')

@section('content')
    <h1>Recettes</h1>
    <ul>
    @foreach ($recettes as $recette)
        <a href="/recettes/{{ $recette->id }}">
            <li>{{ $recette->nom }}</li>
        </a>
    @endforeach
    </ul>
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif
@endsection