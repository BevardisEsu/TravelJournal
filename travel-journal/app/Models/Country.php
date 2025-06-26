<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'iso3',
        'latitude',
        'longitude',
        'boundaries'
    ];

    protected $casts = [
        'boundaries' => 'array',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
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
