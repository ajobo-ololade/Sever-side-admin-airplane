<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// ADMIN ROUTES


// Airplane Route
    Route::resource('/airplane', AirplaneController::class);
// Route::get('/airplane/',[AirplaneController::class,'index']);
// Route::post('/airplane/create',[AirplaneController::class,'create']);

// AirplaneType Route
    Route::resource('/airplanetype', AirplaneTypeController::class);


// AirplaneType Route
    Route::resource('/crew', CrewController::class);


// AirplaneType Route
    Route::resource('/employee', EmployeeController::class);

// Flight Route
// Route::get('/flight/',[FlightController::class,'index']);
     Route::resource('/flight', FlightController::class); 


// AirplaneType Route
    Route::resource('/passenger', PassengerController::class);


// AirplaneType Route
    Route::resource('/rating', RatingController::class);


// AirplaneType Route
    Route::resource('/schedule', ScheduleController::class);





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
