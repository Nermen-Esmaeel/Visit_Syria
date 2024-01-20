<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
                
            'firstname' =>$this->user->firstname,
            'lastname' =>$this->user->lastname,
            'content' =>$this->content,
            'Created date' =>$this->created_at,
            

        ];
    }
}
