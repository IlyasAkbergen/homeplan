<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApartmentComplex extends Model
{
    public function layouts()
    {
        return $this->belongsToMany(Layout::class);
    }
}
