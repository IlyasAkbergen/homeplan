<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LayoutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $requests
     * @return array
     */
    public function toArray($request)
    {
        $roomTypes = $this->relationLoaded('roomTypes') ? RoomTypeResource::collection($this->roomTypes) : [];

        return [
            'id' => $this->id,
            'space' => $this->space,
            'rooms_count' => $this->rooms_count,
            'roomTypes' => $roomTypes,
            'pivot_id'=>$this->whenPivotLoaded('apartment_complex_layout', function () {
                return $this->pivot->id;
            }),
            'images' => $this->when($this->relationLoaded('images'),
                ImageResource::collection($this->images)
            ),
        ];
    }
}
