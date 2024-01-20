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

                'City' =>new CityResource($this->city),
                'Cover_path' =>$this->photo_cover,
                'Title' =>$this->title_en,
                'Site_rating' =>$this->Site_rating,
                'Description' => $this->description_en,
                'Photos' =>PhotosResource::collection($this->photos),
                'street_en' => $this->street_en,
                'city_en'   => $this->city_en,
                'Email' => $this->email,
                'Working_time' => $this->working_time,
                'number of comments' => $this->comments->where('deleted_at',null)->count(),
                'Comments'  => CommentsResource::collection($this->comments),

            ];
        }
        elseif(($request->header('lan')=="ar")){

            return [

                'City' =>new CityResource($this->city),
                'Cover_path' =>$this->photo_cover,
                'Title' =>$this->title_ar,
                'Site_rating' =>$this->Site_rating,
                'Description' => $this->description_ar,
                'Photos' =>PhotosResource::collection($this->photos),
                'street_ar' => $this->street_ar,
                'city_ar'   => $this->city_ar,
                'Email' => $this->email,
                'Working_time' => $this->working_time,
                'number of comments' => $this->comments->where('deleted_at',null)->count(),
                'Comments'  => CommentsResource::collection($this->comments),


            ];
        }


    }
}
