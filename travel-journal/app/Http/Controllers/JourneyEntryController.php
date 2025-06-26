<?php

namespace App\Http\Controllers;

use App\Models\JourneyEntry;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JourneyEntryController extends Controller
{
    public function index()
    {
        return JourneyEntry::with(['country', 'city', 'photos'])
            ->latest('visit_date')
            ->paginate(10);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'nullable|exists:cities,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'visit_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:visit_date',
            'rating' => 'nullable|integer|min:1|max:5',
            'tags' => 'nullable|array',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $entry = JourneyEntry::create($request->all());
        
        return response()->json($entry->load(['country', 'city']), 201);
    }

    public function show(JourneyEntry $journeyEntry)
    {
        return $journeyEntry->load(['country', 'city', 'photos']);
    }

    public function update(Request $request, JourneyEntry $journeyEntry)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'visit_date' => 'sometimes|date',
            'end_date' => 'nullable|date|after_or_equal:visit_date',
            'rating' => 'nullable|integer|min:1|max:5',
            'tags' => 'nullable|array',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $journeyEntry->update($request->all());
        
        return $journeyEntry->load(['country', 'city', 'photos']);
    }

    public function destroy(JourneyEntry $journeyEntry)
    {
        $journeyEntry->delete();
        return response()->json(['message' => 'Entry deleted successfully']);
    }
}
