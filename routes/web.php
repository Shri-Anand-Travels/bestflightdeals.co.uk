<?php

use App\Http\Controllers\CheapFlights;
use App\Http\Controllers\CheapFlightsControllers;
use App\Http\Controllers\Flights;
use App\Http\Controllers\FlightsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', fn() => view('welcome'));
Route::get('/about-us', fn() => view('about-us'));
Route::get('/contact-us', fn() => view('contact-us'));
Route::get('/privacy-policy', fn() => view('privacy-policy'));
Route::get('/terms-and-conditions', fn() => view('terms-and-condition'));
Route::get('/thank-you', fn() => view('thank'));
Route::get('/fly-now-pay-later', fn() => view('fly-now-pay-later'));
Route::get('/flight/enquiry', fn() => view('flight-enquiry'));
Route::get('/flights-to-{destination}', [CheapFlightsControllers::class, 'destination']);
Route::get('/search/flights', [FlightsController::class, 'search']);
Route::get('/book-with-confidence', fn() => view('book-with-confidence'));
Route::get('/covid-19-update', fn() => view('covid-19-update'));
Route::get('/holidays', fn() => view('holidays'));
Route::get('/flights', fn() => view('flights'));
