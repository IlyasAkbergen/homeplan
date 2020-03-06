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
        return [
            'id' => $this->id,
            'space' => $this->space,
            'rooms_count' => $this->rooms_count,
            'rooms' => $this->when($this->relationLoaded('rooms'),
                RoomResource::collection($this->rooms)
            ),
            'images' => $this->when($this->relationLoaded('images'),
                ImageResource::collection($this->images)
            )
        ];
    }
}
