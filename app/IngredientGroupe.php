<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientGroupe extends Model
{
    public function recette()
    {
        return $this->belongsTo(Recette::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
