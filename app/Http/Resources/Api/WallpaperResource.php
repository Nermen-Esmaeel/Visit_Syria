<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WallpaperResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        
            return [

                'Wallpaper_ID' =>$this->id,
                'Picture_name' =>$this->picture_name,
                'Wallpaper' =>$this->photos,
                'type' =>$this->type,
                


            ];
        
    }
}
