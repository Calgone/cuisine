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
            'name' => $this->name,
            'description' => $this->description,
            'owner' => $this->owner,
            'nb_people' => $this->nb_people,
            'prep_minutes' => $this->prep_minutes,
            'cook_minutes' => $this->cook_minutes,
            'rest_minutes' => $this->rest_minutes,
            'cost' => $this->cost,
            'difficulty' => $this->difficulty,
            'img_path' => $this->img_path,
            'steps' => $this->steps,
        ];
    }
}
