<?php

namespace App\Http\Controllers;

use App\Models\Airports;
use App\Models\Flights;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class CheapFlightsControllers extends Controller
{
    public function index(): Factory|View|Application
    {
        $destinations = $this->cheapFlightPage();
        $data = array('destination' => null, 'iataDestination' => null, 'flights' => [], 'destinations' => $destinations);
        return view('cheap-flights')->with($data);
    }

    public function cheapFlightPage()
    {
        return Flights::select(DB::raw('MIN(flights.Adults) AS Adults, aairlinecode, Source, Destination,
         sourceAirports.city source_city, destinationAirports.city destination_city, "Economy" AS cabin'))
            ->leftjoin('airports AS sourceAirports', 'sourceAirports.iata', '=', 'flights.Source')
            ->leftjoin('airports AS destinationAirports', 'destinationAirports.iata', '=', 'flights.Destination')
            ->groupBy('Destination')
            ->orderBy('destination_city')
            ->get();
    }

    public function destination($destination = null): Factory|View|Application
    {
        $destination = str_replace('-', ' ', $destination);
        $flights = $this->flightsByDestination($destination);
        $iataDestination = $this->iataByDestination($destination);
        $data = array(
            'destination' => $destination,
            'country' => $iataDestination->country,
            'iataDestination' => $iataDestination->iata,
            'flights' => $flights,
            'destinations' => []
        );
        return view('cheap-flights')->with($data);
    }

    public function flightsByDestination($destination = null)
    {
        $destination = str_replace('-', ' ', $destination);
        return Flights::whereIn('Destination', function ($query) use (&$destination) {
            $query->select('iata')->from('airports')->where('city', 'like', '%' . $destination . '%');
        })
            ->with('airlines')
            ->with('sourceAirport')
            ->with('destinationAirport')
            ->get();
    }

    public function iataByDestination($destination = null)
    {
        return Airports::where('city', 'like', '%' . $destination . '%')->first();
    }

    public function footerFlightDestinations()
    {
        return Airports::select('city', 'iata')->whereIn('iata', ['ACC', 'ANU', 'BJL', 'DXB', 'FNA', 'HRE', 'JNB', 'LOS', 'MCO', 'MEL'])->get();
    }
}
