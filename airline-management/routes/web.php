<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;  // query selector
use App\Http\Controllers\Admin\{
    AirplaneController,
    AirplaneTypeController,
    CrewController,
    EmployeeController,
    FlightController,
    PassengerController,
    RatingController,
    ScheduleController
};

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
    // $insert=DB::table('airplane_tb')->insert([
    //     "aircraft_type"=>'1',
    //     "manufacturer"=>'Lim works',
    //     "model"=>'A30',  
    //  ]);
});
