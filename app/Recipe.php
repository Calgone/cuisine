<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecipeCreated;

class Recipe extends Model
{
    protected $fillable = ['nom', 'description', 'owner_id'];

    // Exemple de gestion d'event
    protected static function boot() // methode existante dans Model
    {
        parent::boot();
        // Fonction qui sera appelée à chaque création de recette
        // Désactivé car se déclenche au moment du seeding
        // static::created(function($recipe) {
        //     Mail::to($recipe->owner->email)->send(
        //         new RecipeCreated($recipe)
        //     );
        // });
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function ingredientGroups()
    {
        return $this->hasMany(IngredientGroup::class);
    }
    
    public function addStep($step)
    {
        $description = $step['description'];
        $order = 1;
        $this->steps()->create(compact('description', 'ordre'));
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
