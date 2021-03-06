<?php

namespace App\Http\Resources;

use App\Http\Resources\Users;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class Foods extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'image' => $this->image,
            'description' => $this->description,
            'price' => $this->price,
            'author' => Users::make(User::find($this->user_id))
        ];
    }
}
