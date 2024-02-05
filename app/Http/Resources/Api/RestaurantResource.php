<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
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
                'Restaurant_id' =>$this->id,
                'City' =>new CityResource($this->city),
                'Services_Rating' =>RatingResource::collection($this->rating),
                'Services' =>ServicesResource::collection($this->services),
                'Cover_path' =>$this->photo_cover,
                'Logo_path' =>$this->photo_logo,
                'Title' =>$this->title_en,
                'Restaurant_rating' =>$this->Restaurant_rating,
                'Description' => $this->description_en,
                'street_en' => $this->street_en,
                'city_en'   => $this->city_en,
                'phone number' => $this->phoneNumber,
                'Email' => $this->email,
                'Facebook' => $this->facebook,
                'Instagram' => $this->instagram,
                'Youtube' => $this->youtube,
                'Twitter' => $this->twitter,
                'Website' => $this->website,
                'Working_time' => $this->working_time,
                'number of comments' => $this->comments->where('deleted_at',null)->count(),
                'Comments'  => CommentsResource::collection($this->comments),
                'photos' =>PhotosResource::collection($this->photos) ,

            ];

        } elseif ($request->header('lan')=="ar"){
            return [
                'Restaurant_id' =>$this->id,
                'City' =>new CityResource($this->city),
                'Services_Rating' =>RatingResource::collection($this->rating),
                'Services' =>ServicesResource::collection($this->services),
                'Cover_path' =>$this->photo_cover,
                'Logo_path' =>$this->photo_logo,
                'Title' =>$this->title_ar,
                'Restaurant_rating' =>$this->Restaurant_rating,
                'Description' => $this->description_ar,
                'street_ar' => $this->street_ar,
                'city_ar'   => $this->city_ar,
                'phone number' => $this->phoneNumber,
                'Email' => $this->email,
                'Facebook' => $this->facebook,
                'Instagram' => $this->instagram,
                'Youtube' => $this->youtube,
                'Twitter' => $this->twitter,
                'Website' => $this->website,
                'Working_time' => $this->working_time,
                'number of comments' => $this->comments->where('deleted_at',null)->count(),
                'Comments'  => CommentsResource::collection($this->comments),
                'photos' =>PhotosResource::collection($this->photos) ,


            ];
        }


    }



    }

