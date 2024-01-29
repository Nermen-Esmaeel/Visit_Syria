<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaticContentResource extends JsonResource
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
                'Title' =>$this->content_title_en,
                'Content' =>$this->content_en,
                'Photo' =>$this->photos,
                
                
            ];
        }
        elseif($request->header('lan')=="ar")
        {
            return [
                'Title' =>$this->content_title_ar,
                'Content' =>$this->content_ar,
                'Photo' =>$this->photos,
                

                
            ];
        }
    }
}
