<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
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
            'order_pivot_id'=>$this->whenPivotLoaded('order_room', function () {
                return $this->pivot->id;
            }),
            'space' => $this->space,
            'price' => $this->price,
            'type' => $this->when($this->relationLoaded('type'),
                new RoomTypeResource($this->type)),
            'style' => $this->when($this->relationLoaded('style'),
                new StyleResource($this->style)),
            'images' => $this->when($this->relationLoaded('images'),
                ImageResource::collection($this->images)),
        ];
    }
}
