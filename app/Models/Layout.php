<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    protected $fillable = ['space', 'rooms_count'];
    protected $with = ['roomTypes', 'images'];
    public function roomTypes()
    {
        return $this->belongsToMany(RoomType::class)->withPivot('id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'model');
    }

    public function appartmentComplexes()
    {
        return $this->belongsToMany(ApartmentComplex::class)->withPivot('id');
    }
}
