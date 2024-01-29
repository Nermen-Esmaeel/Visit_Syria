<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LandingPhotosResource extends JsonResource
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
                'Picture_name' =>$this->picture_name,
                'Title' =>$this->content_title_en,
                'Photo' =>$this->photos,
                

                
            ];
        }
        elseif($request->header('lan')=="ar")
        {
            return [
                'ID' =>$this->id,
                'Picture_name' =>$this->picture_name,
                'Title' =>$this->content_title_ar,
                'Photo' =>$this->photos,
                
                
            ];
        }
    }
}
