<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomTypeResource;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function getAll(){
        return $this->responseSuccess(
            RoomTypeResource::collection(
                RoomType::with(['rooms', 'rooms.images'])
                    ->where('deleted', 0)
                    ->get()
            )
        );
    }
}
