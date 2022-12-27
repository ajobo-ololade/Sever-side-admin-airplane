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

Route::post('/airplane/create',[AirplaneController::class,'create']);
Route::get('/airplane/',[AirplaneController::class,'index']);
// Flight Route
Route::get('/flight/',[FlightController::class,'index']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
