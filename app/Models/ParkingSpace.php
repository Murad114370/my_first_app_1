<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingSpace extends Model
{
    use HasFactory;

    protected $fillable = [
        'space_number',
        'location',
        'type',
        'is_available',
        'hourly_rate',
        'current_vehicle_plate',
        'occupied_at',
        'user_id',
        'notes'
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'occupied_at' => 'datetime',
        'hourly_rate' => 'decimal:2'
    ];

    protected $dates = [
        'occupied_at',
        'created_at',
        'updated_at',
    ];

    protected $table = 'parking_spaces';

    /**
     * Relationship to the user who reserved the space
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope for available spaces
     */
    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    /**
     * Scope for occupied spaces
     */
    public function scopeOccupied($query)
    {
        return $query->where('is_available', false);
    }

    /**
     * Scope for spaces by type
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Check if space is currently occupied
     */
    public function isOccupied()
    {
        return !$this->is_available;
    }

    /**
     * Calculate parking fee based on hours
     */
    public function calculateFee($hours)
    {
        return $hours * $this->hourly_rate;
    }
}