<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = ['recipe_id', 'description', 'order', 'complete'];
    
    public function recipe()
    {
        // si la relation renvoie null il faut préciser le champs :
        // return $this->belongsTo('App\Recipe', 'recipe_id'); 
        return $this->belongsTo(Recipe::class);
    }

    public function complete($complete = true)
    {
        $this->update(compact('complete'));
    }

    public function incomplete()
    {
        $this->complete(false);
    }
}
