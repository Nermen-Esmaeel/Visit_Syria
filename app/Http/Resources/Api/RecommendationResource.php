<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecommendationResource extends JsonResource
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
                'City' =>$this->recommendatable,
                
            ];

        } elseif ($request->header('lan')=="ar"){
            return [

                'ID' =>$this->id,
                'City' =>$this->recommendatable,

            ];
        }
    }
}
