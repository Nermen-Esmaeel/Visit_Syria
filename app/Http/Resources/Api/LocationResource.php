<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        if(($request->header('lan')=="en")){
            
            return [
                'Street' =>$this->street_en,
                'City' =>$this->city_en,
                'Governorate' =>$this->governorate_en,
            ];
        }
        elseif(($request->header('lan')=="ar")){
           
            return [

                'Street' =>$this->street_ar,
                'City' =>$this->city_ar,
                'Governorate' =>$this->governorate_ar,

            ];
        }
    }
}
