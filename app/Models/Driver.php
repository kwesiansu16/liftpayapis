<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Driver extends Model
{
    use HasFactory,HasApiTokens;
    protected $table = "drivers";

    protected $fillable= [

      'drivers_id',

       'name',
      'email',
    'password',
    'car_image',
        'phone_number',
      'about',
        'car_model',
        'car_color',
       'number_plate',
        'number_of_seats'

    ];

    protected $hidden = array('password');

    //protected $primaryKey='drivers_id';

    //protected $keyType = 'string';

    //public $incrementing = false;

  /*  protected static function boot(){
      parent::boot();
      static::creating(function($model){
        if(empty($model->($model->getKeyName()})))
      })
    }
*/

}
