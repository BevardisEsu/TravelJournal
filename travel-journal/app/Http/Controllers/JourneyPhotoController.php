<?php

namespace App\Http\Controllers;

use App\Models\JourneyEntry;
use App\Models\JourneyPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JourneyPhotoController extends Controller
{
    public function store(Request $request, JourneyEntry $journeyEntry)
    {
        $request->validate([
            'photos' => 'required|array|max:10',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB max
            'captions' => 'nullable|array',
            'captions.*' => 'nullable|string|max:255',
        ]);

        $uploadedPhotos = [];
        $sortOrder = $journeyEntry->photos()->max('sort_order') ?? 0;

        foreach ($request->file('photos') as $index => $file) {
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('journey-photos', $filename, 'public');

            $photo = $journeyEntry->photos()->create([
                'filename' => $filename,
                'original_name' => $file->getClientOriginalName(),
                'path' => $path,
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'caption' => $request->input("captions.{$index}"),
                'sort_order' => ++$sortOrder,
            ]);

            $uploadedPhotos[] = $photo;
        }

        return response()->json($uploadedPhotos, 201);
    }

    public function update(Request $request, JourneyPhoto $journeyPhoto)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $journeyPhoto->update($request->only(['caption', 'sort_order']));

        return $journeyPhoto;
    }

    public function destroy(JourneyPhoto $journeyPhoto)
    {
        $journeyPhoto->delete();
        return response()->json(['message' => 'Photo deleted successfully']);
    }

    public function reorder(Request $request, JourneyEntry $journeyEntry)
    {
        $request->validate([
            'photo_ids' => 'required|array',
            'photo_ids.*' => 'exists:journey_photos,id',
        ]);

        foreach ($request->photo_ids as $index => $photoId) {
            JourneyPhoto::where('id', $photoId)
                ->where('journey_entry_id', $journeyEntry->id)
                ->update(['sort_order' => $index + 1]);
        }

        return response()->json(['message' => 'Photos reordered successfully']);
    }
}