<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Passenger;
use Illuminate\Support\Facades\Hash;

class PassengerController extends Controller
{
    //



    public function pass_register(Request $request){

        $request->validate([
            "passengers_name" =>"required",
            "passengers_email" => "required|email|unique:passengers",
            "password" => "required|confirmed",
            "phone_number" => "required"
        
        ]);

        $passenger = new Passenger();
        $passenger->passengers_name = $request->passengers_name;

        $passenger->passengers_email = $request->passengers_email;
        $passenger->phone_number = $request->phone_number;
        $passenger->password = Hash::make($request->password);
        $passenger->save();

        return response()->json([
            "status"=>1,
            "message" => "Passenger registered successfully",
            

        ]);


    }

    public function pass_login(Request $request){

        $request->validate([
            "passengers_email"=>"required|email",
            "password"=>"required",
        ]);

        $passenger = Passenger::where("passengers_email","=",$request->passengers_email)->first();
        if(isset($passenger->id)){
            if(Hash::check($request->password,$passenger->password)){
       //create token
       $token1 = $passenger->createToken("auth_token")->plainTextToken;
            
            //send response
        return response([
            "status" => 1,
            "message" => "Passenger is logged in",
            "access_token" => $token1

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
                "message"=>"Passenger not found",
                "message"=>"Passenger not available"

            ],404);
        }


    }

    public function pass_profile(){

        return response()->json([
            "status" => 1,
            "message" => "Passenger Profile Information",
            "message" => "Passenger ",
            "data" => auth()->user()
        ]);



    }

    public function pass_logout(){
        $status = logout();
        if($user==1){

            


        
        }
    }
}
