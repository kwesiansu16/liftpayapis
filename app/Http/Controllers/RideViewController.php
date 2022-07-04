<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class RideViewController extends Controller
{
    //
    public function index(){
        $rides = DB::select('select * from rides');
        return view('rides',['rides'=>$rides]);


        //$count = Ride::count();
        //return View::make('dashboard')->with('count', $count);

       // $usersData = Ride::all();
        }

        public function passengerslist(){
            $passengers = DB::select('select * from passengers');
            return view('passengers',['passengers'=>$passengers]);
    
        }

        
        public function driverslist(){
            $drivers = DB::select('select * from drivers');
            return view('driverstable',['drivers'=>$drivers]);
    
        }



    public function viewRides(){
        $ride = DB::table('rides')->count();
        $driver = DB::table('drivers')->count();
        $passenger = DB::table('passengers')->count();
        return view('dashboard',compact('ride','driver','passenger'));
    }

   
}

