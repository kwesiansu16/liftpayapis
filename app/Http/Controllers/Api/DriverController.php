<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;
use Illuminate\Support\Facades\Hash;


class DriverController extends Controller
{
    //

    public function getDrivers(){
      
        $drivers = Driver::all();
        return response()->json([
            "status"=>1,
            "message"=>"Drivers",
            "All"=>$drivers,
            
            
            

        ]);

        
        
    }


    public function register(Request $request){
        $request->validate([
                "name" =>"required",
                "email" => "required|email|unique:drivers",
                "password" => "required|confirmed",
                "car_image" => "required",
                "phone_number" => "required|max:10",
                "about" => "required",
                "car_model" => "required",
                "car_color" => "required",
                "number_plate" => "required|unique:drivers",
                "number_of_seats" => "required",
                



            ]);

            $driver = new Driver();
            $driver->name = $request->name;

            $driver->email = $request->email;
            $driver->password = Hash::make($request->password);
      
            $driver->phone_number = $request->phone_number;
            $driver->about = $request->about;
            $driver->car_model = $request->car_model;
            $driver->car_color = $request->car_color;
            $driver->car_image = $request->car_image;
            $driver->number_plate = $request->number_plate;
            $driver->number_of_seats = $request->number_of_seats;
            $driver->save();

            return response()->json([
                "status"=>1,
                "message" => "Driver registered successfully",
                
    
            ]);





    }

    public function login(Request $request){

        $request->validate([
            "email"=>"required|email",
            "password"=>"required"
        ]);

        $driver = Driver::where("email","=",$request->email)->first();
        if(isset($driver->id)){
            if(Hash::check($request->password,$driver->password)){
       //create token
       $token = $driver->createToken("auth_token")->plainTextToken;
            
            //send response
        return response([
            "status" => 1,
            "message" => "Driver is logged in",
            "access_token" => $token

        ]);
            }else{
                return response()->json([
                    "status"=> 0,
                    "message"=>"Password not matched"
    
                ],404);

            }
            


        }else{
            return response()->json([
                "status"=> 0,
                "message"=>"Driver not found",
                "message"=>"Driver not available"

            ],404);
        }


    }

    public function profile(){

        return response()->json([
            "status" => 1,
            "message" => "Driver Profile Information",
            "data" => auth()->user()
        ]);

    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            "status"=>1,
            "message"=> "Driver logged out successful",
        ]);

    }
}
