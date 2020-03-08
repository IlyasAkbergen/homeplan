<?php

namespace App;

use App\Models\ApartmentComplex;
use App\Models\Layout;
use App\Models\Room;
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

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    public function getPrice()
    {
        return $this->rooms->sum('price');
    }
}
