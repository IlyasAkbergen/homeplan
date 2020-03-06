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
        return response()->json([
            'complexes' => ApartmentComplexResource::collection(
                ApartmentComplex::with(['layouts'])->get()
            )
        ]);

    }
}
