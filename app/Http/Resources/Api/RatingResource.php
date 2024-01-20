<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        if ($request->header('lan')=="en") {
       
            return [
                'ID' =>$this->id,
                'Service_name' =>$this->name_en,
                'Rating_value' =>$this->value,
                
            ];
        }
        elseif($request->header('lan')=="ar")
        {
            return [
                'ID' =>$this->id,
                'Service_name' =>$this->name_ar,
                'Rating_value' =>$this->value,
                
            ];
        }

    }
}
