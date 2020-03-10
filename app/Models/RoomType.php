<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = ['name', 'icon'];
    public function layouts(){
        return $this->belongsToMany(Layout::class)->withPivot('id');
    }
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
