<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\RidePreference;

class RidePreferenceController extends Controller
{
    //
    public function getRidePreferences(){
        $rides = RidePreference::all();
          return response()->json([
              "status"=>1,
              "message"=>"Ride PreferencePassenger",
              "All"=>$rides,
          ]);
      }

      public function getsingleRidePreferences(){
          $ridepreference = RidePreference::all();
        

      }

      public function createRidePreference(Request $request){
        $request->validate([
            'start_location',
            'start_latitude',
             'start_longitude',
            'end_location',
            'end_latitude',
            'end_longitude',
            'time_tolerance_minutes',
      
              ]);
      
              $passengers_id = auth()->user()->id;
      
              $ridePreference = new RidePreference();
              $ridePreference->passengers_id = $passengers_id;
              $ridePreference->start_location = $request->start_location;
              $ridePreference->end_location = $request->end_location;
              $ridePreference->start_latitude = $request->start_latitude;
              $ridePreference->end_latitude = $request->end_latitude;
              $ridePreference->start_longitude = $request->start_longitude;
              $ridePreference->end_longitude = $request->end_longitude;
              $ridePreference->time_tolerance_minutes = $request->time_tolerance_minutes;
             
      
             
            
             
      
              $ridePreference->save();
      
              return response()->json([
                  "status" => 1,
                  "message" => "Ride Preference has been change by user uploaded"
                 
              ]);
}

public function destroyPreference($id){

    $ridePreference = RidePreference::find($id);
    $ridePreference->delete();
    
      return response()->json([
        "status" => 1,
        "message" => "Ride Preference  has been deleted"
       
    ]);

}

public function update(Request $request,$id)
{
    //
    $ridePreference=RidePreference::find($id);
    $ridePreference->update($request->all());
    

    return response()->json([
        "status" => 1,
        "message" => "Ride Preference has been updated"
       
    ]);

}

public function preferenceDelete($id)
{
  $ridePreference = RidePreference::find($id);
  $ridePreference->delete();
  
       return response()->json([
        "status" => 1,
        "message" => "Ride Preference  has been deleted"
       
    ]);

 

}


}