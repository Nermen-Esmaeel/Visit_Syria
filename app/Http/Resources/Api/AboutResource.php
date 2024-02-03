<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        if ($request->header('lan')=='en') {
            
            return [
                'Article_id' =>$this->id,
                'Title' =>$this->title_en,
                'Description' => $this->content_en,
                
                'photos' =>PhotosResource::collection($this->photos) ,
                


            ];
        } elseif($request->header('lan')=='ar') {
           
            return [
                'Blog_id' =>$this->id,
                'Title' =>$this->title_ar,
                'Description' => $this->content_ar,
                'photos' =>PhotosResource::collection($this->photos) ,
            ];
           
        }
    }
}
