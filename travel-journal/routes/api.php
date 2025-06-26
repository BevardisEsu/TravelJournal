<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\JourneyEntryController;
use App\Http\Controllers\JourneyPhotoController;

// Countries
Route::prefix('countries')->group(function () {
    Route::get('/', [CountryController::class, 'index']);
    Route::get('/{country}', [CountryController::class, 'show']);
    Route::get('/{country}/cities', [CountryController::class, 'cities']);
});

// Cities
Route::prefix('cities')->group(function () {
    Route::get('/{city}', [CityController::class, 'show']);
    Route::get('/{city}/journey-entries', [CityController::class, 'journeyEntries']);
});

// Journey Entries
Route::prefix('journey-entries')->group(function () {
    Route::get('/', [JourneyEntryController::class, 'index']);
    Route::post('/', [JourneyEntryController::class, 'store']);
    Route::get('/{journeyEntry}', [JourneyEntryController::class, 'show']);
    Route::put('/{journeyEntry}', [JourneyEntryController::class, 'update']);
    Route::delete('/{journeyEntry}', [JourneyEntryController::class, 'destroy']);
    
    // Photos for journey entries
    Route::post('/{journeyEntry}/photos', [JourneyPhotoController::class, 'store']);
    Route::put('/{journeyEntry}/photos/reorder', [JourneyPhotoController::class, 'reorder']);
});

// Individual photo operations
Route::prefix('photos')->group(function () {
    Route::put('/{journeyPhoto}', [JourneyPhotoController::class, 'update']);
    Route::delete('/{journeyPhoto}', [JourneyPhotoController::class, 'destroy']);
});