<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class JourneyPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'journey_entry_id',
        'filename',
        'original_name',
        'path',
        'mime_type',
        'size',
        'caption',
        'sort_order'
    ];

    public function journeyEntry()
    {
        return $this->belongsTo(JourneyEntry::class);
    }

    public function getUrlAttribute()
    {
        return Storage::disk('public')->url($this->path);
    }

    public function getFormattedSizeAttribute()
    {
        $bytes = $this->size;
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($photo) {
            if (Storage::disk('public')->exists($photo->path)) {
                Storage::disk('public')->delete($photo->path);
            }
        });
    }
}