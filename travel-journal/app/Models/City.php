<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'name',
        'latitude',
        'longitude',
        'population',
        'is_capital'
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'is_capital' => 'boolean',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function journeyEntries()
    {
        return $this->hasMany(JourneyEntry::class);
    }

    public function getVisitedAttribute()
    {
        return $this->journeyEntries()->exists();
    }
}
