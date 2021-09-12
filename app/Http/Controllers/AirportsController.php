<?php

namespace App\Http\Controllers;

use App\Models\Airports;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AirportsController extends Controller
{
    public function index()
    {
    }

    public function sourceAirports()
    {
        try {
            $response = Http::asForm()->post(env('BBT_HOST') . '/flight/server/routes/source-airports.php');
            $airports = json_decode($response->body());
        } catch (RequestException | ConnectionException $exception) {
            $airports = [];
        }
        return $airports;
    }

    public function destinationAirports()
    {
        try {
            $response = Http::asForm()->post(env('BBT_HOST') . '/flight/server/routes/destination-airports.php');
            $airports = json_decode($response->body());
        } catch (RequestException | ConnectionException $exception) {
            $airports = [];
        }
        return $airports;
    }
}
