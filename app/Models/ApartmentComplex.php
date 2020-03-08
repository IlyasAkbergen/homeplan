<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApartmentComplex extends Model
{
    protected $fillable = ['name', 'address'];

    public function layouts()
    {
        return $this->belongsToMany(Layout::class)->withPivot('id');
    }
}
