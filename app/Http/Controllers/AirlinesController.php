<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AirlinesController extends Controller
{
    public function index()
    {
    }

    public function airportList()
    {
        try {
            $response = Http::asForm()->get(env('BBT_HOST') . '/common/server/routes/airlines.php',
                array('api_key' => env('API_KEY_BBT')));
            $airports = json_decode($response->body());
        } catch (RequestException | ConnectionException $exception) {
            $airports = [];
        }

        return $airports;
    }
}
