<?php

// app/Models/ParkingReservation.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingReservation extends Model
{
    protected $fillable = [
        'user_id', 
        'parking_space_id',
        'vehicle_number',
        'start_time',
        'end_time',
        'status',
        'amount'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parkingSpace()
    {
        return $this->belongsTo(ParkingSpace::class);
    }
}
