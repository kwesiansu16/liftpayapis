<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RideViewController;
use App\Http\Controllers\DriverViewController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function(){

    return view('dashboard');

});

Route::get('/driverstable',function(){

    return view('driverstable');

});

Route::get('/passengers',function(){

    return view('passengers');

});
Route::get('/rides',function(){

    return view('rides');

});
Route::get('passengers','RideViewController@passengerslist');
Route::get('driverstable','RideViewController@driverslist');
Route::get('rides','RideViewController@index');
Route::get('dashboard','RideViewController@viewRides');


Route::get('/getform', 'App\Http\Controllers\PaymentController@show')->name('form');

// Laravel 5.1.17 and above
Route::post('/pay', 'App\Http\Controllers\PaymentController@redirectToGateway')->name('pay');

// Laravel 8
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback']);
// Laravel 8


