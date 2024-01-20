<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray( $request): array
    {
        if ($request->header('lan')=='en') {
            
            return [
                "City name" =>$this->governorates,
            ];
        } elseif($request->header('lan')=='ar') {
           
            return [
                "City name" =>$this->governorates_AR,
            ];
           
        }
        
    }
}
