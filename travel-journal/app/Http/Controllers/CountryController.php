<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        return Country::with(['journeyEntries' => function($query) {
            $query->select('id', 'country_id', 'title');
        }])->get();
    }

    public function show(Country $country)
    {
        return $country->load(['cities', 'journeyEntries.photos']);
    }

    public function cities(Country $country)
    {
        return $country->cities()->with(['journeyEntries' => function($query) {
            $query->select('id', 'city_id', 'title', 'visit_date');
        }])->get();
    }
}
