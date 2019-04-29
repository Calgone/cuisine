<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    protected $fillable = ['recette_id', 'description', 'ordre', 'complete'];
    
    public function recette()
    {
        // si la relation renvoie null il faut préciser le champs :
        // return $this->belongsTo('App\Recette', 'recette_id'); 
        return $this->belongsTo(Recette::class);
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
