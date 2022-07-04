<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DriverViewController extends Controller
{
    //
    public function viewDrivers(){
        $count1 = DB::table('drivers')->count();
        return view('dashboard',compact('count1'));
    }
}
