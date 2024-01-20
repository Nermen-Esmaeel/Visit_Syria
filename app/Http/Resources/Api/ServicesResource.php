<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicesResource extends JsonResource
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

                "Service_name" =>$this->name_en,

            ];
        }
        elseif(($request->header('lan')=="ar")){
            return [

                "Service_name" =>$this->name_ar,

            ];
        }
    }
}
