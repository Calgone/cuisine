@component('mail::message')
# Nouvelle recette créée : {{ $recette->nom }}

{{ $recette->description }}

@component('mail::button', ['url' => url('/recettes/' . $recette->id)])
Voir la recette
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
