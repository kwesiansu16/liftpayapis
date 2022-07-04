<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Ride;

class RideController extends Controller
{

    public function getRides(){
      $rides = Ride::all();
        return response()->json([
            "status"=>1,
            "message"=>"Rides",
            "All"=>$rides,
        ]);
    }

  

    public function createRide(Request $request){
  $request->validate([
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
            'end_longitude'

        ]);

        $drivers_id = auth()->user()->id;

        $ride = new Ride();
        $ride->drivers_id = $drivers_id;
        $ride->start_location = $request->start_location;
        $ride->end_location = $request->end_location;
        $ride->start_latitude = $request->start_latitude;
        $ride->end_latitude = $request->end_latitude;
        $ride->start_longitude = $request->start_longitude;
        $ride->end_longitude = $request->end_longitude;
        $ride->ride_cost = $request->ride_cost;
        $ride->ride_distance = $request->ride_distance;

        $ride->ride_time = $request->ride_time;
        $ride->number_of_occupants = $request->number_of_occupants;
      
        $ride->ride_date = $request->ride_date;

        $ride->save();

        return response()->json([
            "status" => 1,
            "message" => "Ride has been uploaded"
           
        ]);



    }

    public function listRide(){

        $drivers_id = auth()->user()->id;
        $rides = Ride::where("drivers_id",$drivers_id)->get();

        return response()->json([
            "status"=>1,
            "message"=>"Rides",
            "data"=>$rides

        ]);

    }

//    public function singleRide($id){

    ///    $single_ride = auth()->user()->id;
     //   $drivers = SingleRide::where('rides',$single_ride);
     //   return response()->json([
       //     "status"=>1,
       //     "message"=>"Single Rides",
        //    "data"=>$single_rides,
            
     //   ]);

  //  }

    public function destroy($id)
    {
      $ride = Ride::find($id);
      $ride->delete();
      
      return response()->json([
        "status"=>1,
        "message"=>"Ride deleted",
        "data"=>$ride

    ]);
    }

   /* public function deleteRide($id){

        $drivers_id = auth()->user()->id;

        if(Ride::where([
            "id" => $id,
            "drivers_id" => $drivers_id
        ]->exists()){
            $rides = Ride::where([
                "id" => $id,
                "drivers_id" => $id
            ]->first();

            $ride->delete();

            return response([
                "status"=>"1",
                "message"=>"Ride has been successfully deleted"
            ]);

        }else{

            return response()->json([
                "status"=>0,
                "message"=>"Ride was not found",
                
                
            ]);

        }


    } */
}
