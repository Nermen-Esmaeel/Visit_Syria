<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomsResource extends JsonResource
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
                
                'rooms' => $this->content_en,
    
            ];

        }
        elseif ($request->header('lan')=="ar")
        {
            return [
                
                'rooms' => $this->content_ar,
    
            ];
        }
        
    }
}
