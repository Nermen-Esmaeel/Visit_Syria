<?php

namespace App\Http\Resources\Api;

use App\Models\Comment;

use Illuminate\Http\Request;
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
                'Hotel_id' => $this->id,
                'City' =>new CityResource($this->city),
                'Services_Rating' =>RatingResource::collection($this->whenLoaded('rating')),
                'Services' =>ServicesResource::collection($this->whenLoaded('services')),
                'Cover_path' =>$this->photo_cover,
                'Logo_path' =>$this->photo_logo,
                'Title' =>$this->title_en,
                'Rating' =>$this->Hotel_rating,
                'Description' => $this->description_en,
                'Photos' =>PhotosResource::collection($this->whenLoaded('photos')),
                'Available_rooms' => RoomsResource::collection($this->whenLoaded('rooms')),
                'Offers' => OffersResource::collection($this->whenLoaded('offers')),
                'street_en' => $this->street_en,
                'city_en'   => $this->city_en,
                'phone_number' => $this->phoneNumber,
                'Email' => $this->email,
                'Facebook' => $this->facebook,
                'Instagram' => $this->instagram,
                'Youtube' => $this->youtube,
                'Twitter' => $this->twitter,
                'Website' => $this->website,
                'Working_time' => $this->working_time,
                'Comments'  =>CommentsResource::collection($this->whenLoaded('comments')),
                'number of comments' => $this->comments->where('deleted_at',null)->count(),


            ];

        } elseif ($request->header('lan')=="ar"){
            return [
                'Hotel_id' => $this->id,
                'City' =>new CityResource($this->city),
                'Services_Rating' => RatingResource::collection($this->whenLoaded('rating')),
                'Services' => ServicesResource::collection($this->whenLoaded('services')),
                'Cover_path' =>$this->photo_cover,
                'Logo_path' =>$this->photo_logo,
                'Title' =>$this->title_ar,
                'Rating' =>$this->Hotel_rating,
                'Description' => $this->description_ar,
                'Photos' =>$this->photos,
                'Available_rooms' => RoomsResource::collection($this->whenLoaded('rooms')),
                'Discounts' => $this->discounts,
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
                'Comments'  => CommentsResource::collection($this->whenLoaded('comments')),
                'number of comments' => $this->comments->where('deleted_at',null)->count(),


            ];
        }


    }
}
