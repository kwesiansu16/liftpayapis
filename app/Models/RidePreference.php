<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RidePreference extends Model
{
    use HasFactory;

    protected $table ="rides_preferences";

    protected $fillable = [
        
     'passengers_id',
    'start_location',
    'start_latitude',
     'start_longitude',
    'end_location',
    'end_latitude',
    'end_longitude',
    'time_tolerance_minutes',
    ];

    
}
