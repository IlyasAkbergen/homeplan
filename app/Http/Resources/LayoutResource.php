<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LayoutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $images = $this->relationLoaded('images')
            ? ImageResource::collection($this->images)
            : null;

        $rooms = $this->relationLoaded('rooms')
            ? $this->rooms
            : null;

        return [
            'id'=>$this->id,
            'space'=>$this->space,
            'rooms_count'=>$this->rooms_count,
            'rooms'=>$rooms,
            'images'=>$images
        ];
//        return parent::toArray($request);
    }
}
