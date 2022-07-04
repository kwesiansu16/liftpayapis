<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;

    protected $table = "rides";

    protected $fillable = [

       'drivers_id',
       'number_of_occupants',
    'ride_cost',
   'ride_date',
    'ride_time',
    'ride_distance',
    'start_location',
    'start_latitude',
    'start_longitude',
     
    'end_location',
    'end_latitude',
    'end_longitude',

    ];

    public $timestamps=false;
}
