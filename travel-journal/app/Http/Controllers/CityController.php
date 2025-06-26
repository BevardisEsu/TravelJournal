<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function show(City $city)
    {
        return $city->load(['country', 'journeyEntries.photos']);
    }

    public function journeyEntries(City $city)
    {
        return $city->journeyEntries()
            ->with(['photos' => function($query) {
                $query->orderBy('sort_order')->take(1);
            }])
            ->latest('visit_date')
            ->get();
    }
}
