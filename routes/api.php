<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\RideController;
use App\Http\Controllers\Api\PassengerController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\RidePreferenceController;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\Driver;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post("register",[DriverController::class,"register"]);
Route::post("login",[DriverController::class,"login"]);



Route::post("sign-up",[PassengerController::class,"pass_register"]);
Route::post("sign-in",[PassengerController::class,"pass_login"]);

Route::get("all-drivers",[DriverController::class,"getDrivers"]);
Route::get("all-passengers",[PassengerController::class,"getPassengers"]);
Route::get("all-reviews",[ReviewController::class,"getReviews"]);
Route::get("all-messages",[MessageController::class,"getMessages"]);

Route::group(["middleware" =>["auth:sanctum"]],function(){
     Route::get("single-ride/{id}",[RideController::class,"singleRide"]);
    Route::get("profile",[DriverController::class,"profile"]);
    Route::get("pass-profile",[PassengerController::class,"pass_profile"]);
    Route::get("logout1",[DriverController::class,"logout"]);

   Route::post("upload-ride-preference",[RidePreferenceController::class,"createRidePreference"]);

   Route::put('/update-ride-preference/{id}',[RidePreferenceController::class,'update']);

   
   Route::delete('/delete-ride-preference/{id}',[RidePreferenceController::class,'preferenceDelete']);
   


 
    Route::get("logout",[PassengerController::class,"pass_logout"]);
    Route::post("upload-ride",[RideController::class,"createRide"]);
    Route::get("list-ride",[RideController::class,"listRide"]);
  //  Route::get("single-ride/{id}",[RideController::class,"singleRide"]);
    Route::delete("delete-ride/{id}",[RideController::class,"destroy"]);

    Route::post("review-ride/{id}",[ReviewController::class,"postReview"]);
   
    

    
    
  
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {


    return $request->user();
});

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = Driver::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->email)->plainTextToken;
});
