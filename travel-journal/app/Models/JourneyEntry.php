<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * @property \Carbon\Carbon $visit_date
 * @property \Carbon\Carbon|null $end_date
 */
class JourneyEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'city_id',
        'title',
        'description',
        'visit_date',
        'end_date',
        'rating',
        'tags',
        'latitude',
        'longitude'
    ];

    protected $casts = [
        'visit_date' => 'datetime',
        'end_date' => 'datetime',
        'tags' => 'array',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function photos()
    {
        return $this->hasMany(JourneyPhoto::class)->orderBy('sort_order');
    }

    public function getDurationAttribute()
    {
        if (!$this->end_date) {
            return 1;
        }
        
        return $this->visit_date->diffInDays($this->end_date) + 1;
    }

    public function getFormattedDateAttribute()
    {
        if ($this->end_date && $this->visit_date->ne($this->end_date)) {
            return $this->visit_date->format('M j, Y') . ' - ' . $this->end_date->format('M j, Y');
        }
        
        return $this->visit_date->format('M j, Y');
    }

    public function scopeByYear($query, $year)
    {
        return $query->whereYear('visit_date', $year);
    }

    public function scopeByCountry($query, $countryId)
    {
        return $query->where('country_id', $countryId);
    }

    public function scopeWithTags($query, array $tags)
    {
        return $query->where(function ($q) use ($tags) {
            foreach ($tags as $tag) {
                $q->orWhereJsonContains('tags', $tag);
            }
        });
    }
}