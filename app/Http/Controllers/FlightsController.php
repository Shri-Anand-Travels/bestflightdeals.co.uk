<?php

namespace App\Http\Controllers;

use App\Models\Airports;
use App\Models\Flights;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FlightsController extends Controller
{
    public function index(): Factory|View|Application
    {
        $data = array('destination' => null);
        return view('flights')->with($data);
    }

    public function search(Request $request): Factory|View|Application
    {
        $params = $request->all();
        $allParams = array_merge($params, array('api_key' => env('API_KEY_BBT')));
        $destination = Airports::select(['city', 'country'])->where('iata', $params['destination'] ?? '')->first();

        try {
            $response = Http::asForm()->post(env('BBT_HOST') . '/flight/server/routes/search-flights.php', $allParams);
            $flights = $response->ok() ? json_decode($response->body()) : [];
        } catch (RequestException | ConnectionException $exception) {
            $flights = [];
        }

        $data = array('destination' => $destination, 'flights' => $flights);
        return view('search-flights')->with($data);
    }

    public function homeWidgetTiles()
    {
        $africa = Flights::select(DB::raw('MIN(flights.Adults) AS Adults, aairlinecode, Source, Destination,
         sourceAirports.city source_city, destinationAirports.city destination_city, "Economy" AS cabin'))
            ->leftjoin('airports AS sourceAirports', 'sourceAirports.iata', '=', 'flights.Source')
            ->leftjoin('airports AS destinationAirports', 'destinationAirports.iata', '=', 'flights.Destination')
            ->whereIn('Destination', ['ACC', 'BJL', 'LOS', 'FNA'])
            ->groupBy('Destination')
            ->orderBy('destination_city')
            ->get();

        $aus = Flights::select(DB::raw('MIN(flights.Adults) AS Adults, aairlinecode, Source, Destination,
         sourceAirports.city source_city, destinationAirports.city destination_city, "Economy" AS cabin'))
            ->leftjoin('airports AS sourceAirports', 'sourceAirports.iata', '=', 'flights.Source')
            ->leftjoin('airports AS destinationAirports', 'destinationAirports.iata', '=', 'flights.Destination')
            ->whereIn('Destination', ['AKL', 'MEL', 'SYD', 'PER'])
            ->groupBy('Destination')
            ->orderBy('destination_city')
            ->get();

        $other = Flights::select(DB::raw('MIN(flights.Adults) AS Adults, aairlinecode, Source, Destination,
         sourceAirports.city source_city, destinationAirports.city destination_city, "Economy" AS cabin'))
            ->leftjoin('airports AS sourceAirports', 'sourceAirports.iata', '=', 'flights.Source')
            ->leftjoin('airports AS destinationAirports', 'destinationAirports.iata', '=', 'flights.Destination')
            ->whereIn('Destination', ['MCO', 'DXB', 'JFK', 'MNL'])
            ->groupBy('Destination')
            ->orderBy('destination_city')
            ->get();

        return array(
            'africa' => $africa,
            'australia / new zealand' => $aus,
            'other destination' => $other
        );

    }
}
