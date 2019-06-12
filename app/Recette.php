<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecetteCreated;

class Recette extends Model
{
    protected $fillable = ['nom', 'description', 'owner_id'];

    // Exemple de gestion d'event
    protected static function boot() // methode existante dans Model
    {
        parent::boot();
        // Fonction qui sera appelée à chaque création de recette
        // Désactivé car se déclenche au moment du seeding
        // static::created(function($recette) {
        //     Mail::to($recette->owner->email)->send(
        //         new RecetteCreated($recette)
        //     );
        // });
    }

    public function etapes()
    {
        return $this->hasMany(Etape::class);
    }

    public function ingredientGroups()
    {
        return $this->hasMany(IngredientGroup::class);
    }
    
    public function addEtape($etape)
    {
        $description = $etape['description'];
        $ordre = 1;
        $this->etapes()->create(compact('description', 'ordre'));
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
