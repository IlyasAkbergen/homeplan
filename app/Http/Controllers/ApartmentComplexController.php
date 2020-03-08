<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApartmentComplexResource;
use App\Models\ApartmentComplex;
use Illuminate\Http\Request;

class ApartmentComplexController extends Controller
{

    /**
     * ApartmentComplexController constructor.
     */
    public function __construct()
    {
    }

    public function getAll() {
        $complexes = ApartmentComplex::with([
            'layouts',
            'layouts.roomTypes',
            'layouts.roomTypes.rooms',
            'layouts.roomTypes.rooms.images',
        ])->get();

        return $this->responseSuccess(ApartmentComplexResource::collection($complexes));
    }
}
