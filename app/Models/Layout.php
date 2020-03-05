<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    protected $fillable = ['space', 'rooms_count'];
    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'model');
    }

    public function appartmentComplexes()
    {
        return $this->belongsToMany(ApartmentComplex::class);
    }
}
