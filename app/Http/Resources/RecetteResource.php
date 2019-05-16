<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecetteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'description' => $this->description,
            'owner' => $this->owner,
            'nb_personnes' => $this->nb_personnes,
            'prepa_minutes' => $this->prepa_minutes,
            'cuisson_minutes' => $this->cuisson_minutes,
            'repos_minutes' => $this->repos_minutes,
            'cout' => $this->cout,
            'difficulte' => $this->difficulte,
            'img_path' => $this->img_path,
            'etapes' => $this->etapes,
        ];
    }
}
