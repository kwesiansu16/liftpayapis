<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Review;

class ReviewController extends Controller
{
    //

    public function getReviews(){
      
        $review = Review::all();
        return response()->json([
            "status"=>1,
            "message"=>"Reviews",
            "All"=>$review,
        ]);

        
        
    }
    public function createRide(Request $request){

        $request->validate([
            'comments',
            'ratings',
            'passenger_status',
            
           
           

        ]);

        $rides_id = auth()->user()->id;

        $review = new Review();
        $review->rides_id = $rides_id;
        $review->comments = $request->comments;
        $review->ratings = $request->ratings;
        $review->pasenger_status = $request->passenger_status;
        
        

        $review->save();

        return response()->json([
            "status" => 1,
            "message" => "Review has been sent for the ride"
           
        ]);



    }

    public function listRide(){

        $drivers_id = auth()->user()->id;
        $review = Review::where("rides_id",$rides_id)->get();

        return response()->json([
            "status"=>1,
            "message"=>"Reviews",
            "data"=>$review

        ]);

    }
}
