<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Passenger extends Model
{
    use HasFactory,HasApiTokens;

    protected $table= "passengers";

    protected $fillable = [

    'passengers_name',
    'passengers_email',
    'password',
    'phone_number',
   

    ];

    protected $hidden = array('password');
}
