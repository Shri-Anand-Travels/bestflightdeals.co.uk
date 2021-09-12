<?php

use App\Http\Controllers\AirlinesController;
use App\Http\Controllers\AirportsController;
use App\Http\Controllers\CheapFlightsControllers;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\FlightsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/flights-to-{destination}', [CheapFlightsControllers::class, 'flightsByDestination']);
Route::get('/destination-airports', [AirportsController::class, 'destinationAirports']);
Route::get('/source-airports', [AirportsController::class, 'sourceAirports']);
Route::get('/flights-widgets', [FlightsController::class, 'homeWidgetTiles']);
Route::get('/airlines', [AirlinesController::class, 'airportList']);
Route::post('/enquiry', [EnquiryController::class, 'saveEnquiry']);
