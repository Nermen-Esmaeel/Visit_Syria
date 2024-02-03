<?php

namespace App\Http\Resources\Api;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Tourist_sitesResource extends JsonResource
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
                'Site_id' =>$this->id,
                'City' =>new CityResource($this->city),
                'Cover_path' =>$this->photo_cover,
                'Title' =>$this->title_en,
                'Site_rating' =>$this->Site_rating,
                'Description' => $this->description_en,
                'city_en'   => $this->city_en,
                'Email' => $this->email,
                'Working_time' => $this->working_time,
                'Comments'  => CommentsResource::collection($this->whenLoaded('comments')),
                'number of comments' => $this->comments->where('deleted_at',null)->count(),
                'photos' =>PhotosResource::collection($this->whenLoaded('photos')) ,


            ];
        }
        elseif(($request->header('lan')=="ar")){

            return [
                'Site_id' =>$this->id,
                'City' =>new CityResource($this->city),
                'Cover_path' =>$this->photo_cover,
                'Title' =>$this->title_ar,
                'Site_rating' =>$this->Site_rating,
                'Description' => $this->description_ar,
                'city_ar'   => $this->city_ar,
                'Email' => $this->email,
                'Working_time' => $this->working_time,
                'Comments'  => CommentsResource::collection($this->whenLoaded('comments')),
                'number of comments' => $this->comments->where('deleted_at',null)->count(),
                'photos' =>PhotosResource::collection($this->whenLoaded('photos')) ,

            ];
        }


    }
}
