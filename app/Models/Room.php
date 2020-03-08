<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $with = ['style'];
    public function type()
    {
        return $this->belongsTo(
            RoomType::class,
            'room_type_id',
            'id');
    }

    public function style()
    {
        return $this->belongsTo(Style::class);
    }

    public function layouts()
    {
        return $this->belongsToMany(Layout::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'model');
    }
}
