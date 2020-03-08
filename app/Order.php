<?php

namespace App;

use App\Models\ApartmentComplex;
use App\Models\Layout;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function apartmentComplex()
    {
        return $this->belongsTo(ApartmentComplex::class);
    }

    public function layout()
    {
        return $this->belongsTo(Layout::class);
    }
}
