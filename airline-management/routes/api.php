<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AirplaneController,
    AirplaneTypeController,
    AuthController,
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

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    // Route::group(['middleware' => ['jwt.verify']], function () { 

// User Route

    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('getUser', [AuthController::class, 'getUser']);

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
     Route::get('/flight/getSchedule/{id}',[FlightController::class,'get_schedule']);
     Route::get('/flight/getCrew/{id}',[FlightController::class,'get_crew']);


// AirplaneType Route
    Route::resource('/passenger', PassengerController::class);


// AirplaneType Route
    Route::resource('/rating', RatingController::class);


// AirplaneType Route
    Route::resource('/schedule', ScheduleController::class);


// });


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
