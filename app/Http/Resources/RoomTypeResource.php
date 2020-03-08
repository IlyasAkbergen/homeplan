<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomTypeResource extends JsonResource
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
            'name' => $this->name,
            'pivot_id'=>$this->whenPivotLoaded('layout_room_type', function () {
                return $this->pivot->id;
            }),
            'rooms' => $this->when($this->relationLoaded('rooms'),
                RoomResource::collection($this->rooms)),
        ];
    }
}
