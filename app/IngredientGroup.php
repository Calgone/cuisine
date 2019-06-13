<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientGroup extends Model
{
    public function recette()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
