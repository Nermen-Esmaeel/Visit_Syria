<?php

namespace App\Http\Resources\Api;

use App\Models\Comment;

use Illuminate\Http\Request;
use App\Http\Resources\Api\CityResource;
use App\Http\Resources\Api\OffersResource;
use App\Http\Resources\Api\RatingResource;
use App\Http\Resources\Api\ServicesResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
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
                
                'City' =>new CityResource($this->city),
                'Services_Rating' =>RatingResource::collection($this->rating),
                'Services' =>ServicesResource::collection($this->services),
                'Cover_path' =>$this->photo_cover,
                'Logo_path' =>$this->photo_logo,
                'Title' =>$this->title_en,
                'Rating' =>$this->Hotel_rating,
                'Description' => $this->description_en,
                'Photos' =>PhotosResource::collection($this->photos),
                'Available_rooms' => RoomsResource::collection($this->rooms),
                'Offers' => OffersResource::collection($this->offers),
                'Location' =>LocationResource::collection($this->locations),
                'phone number' => $this->phoneNumber,
                'Email' => $this->email,
                'Facebook' => $this->facebook,
                'Instagram' => $this->instagram,
                'Youtube' => $this->youtube,
                'Twitter' => $this->twitter,
                'Website' => $this->website,
                'Working_time' => $this->working_time,
                'number of comments' => $this->comments->where('deleted_at',null)->count(),
                'Comments'  =>CommentsResource::collection($this->comments),
    
            ];

        } elseif ($request->header('lan')=="ar"){
            return [
                
                'City' =>new CityResource($this->city),
                'Services_Rating' => RatingResource::collection($this->rating),
                'Services' => ServicesResource::collection($this->services),
                'Cover_path' =>$this->photo_cover,
                'Logo_path' =>$this->photo_logo,
                'Title' =>$this->title_ar,
                'Rating' =>$this->Hotel_rating,
                'Description' => $this->description_ar,
                'Photos' =>$this->photos,
                'Available_rooms' => RoomsResource::collection($this->rooms),
                'Discounts' => $this->discounts,
                'Location' =>LocationResource::collection($this->locations),
                'phone number' => $this->phoneNumber,
                'Email' => $this->email,
                'Facebook' => $this->facebook,
                'Instagram' => $this->instagram,
                'Youtube' => $this->youtube,
                'Twitter' => $this->twitter,
                'Website' => $this->website,
                'Working_time' => $this->working_time,
                'number of comments' => $this->comments->where('deleted_at',null)->count(),
                'Comments'  =>CommentsResource::collection($this->comments),
    
            ];
        }
        
       
    }
}
