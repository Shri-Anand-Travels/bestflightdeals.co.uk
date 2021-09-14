<x-layout title="Flights {{(!empty($destination->city))? 'to ' .ucfirst($destination->city) :''}}">

    @push('metaTags')
        <meta name="title"
              content="Cheap Flights to {{ucfirst($destination->city??'')}}, {{ucfirst($destination->country??'')}} | Cheap Flights Tickets to {{ucfirst($destination->city??'')}}, {{ucfirst($destination->country??'')}}  | Book Flights Tickets to {{ucfirst($destination->city??'')}}, {{ucfirst($destination->country??'')}}">
        <meta name="description"
              content="Cheap tickets on {{ucfirst($destination->city??'')}}, {{ucfirst($destination->country??'')}} flights. BestFlightDeals offers cheap flights to with price match guaranteed , low deposit & easy monthly payment options.">
        <meta name="keywords"
              content="Flights to {{ucfirst($destination->city??'')}}, {{ucfirst($destination->country??'')}}, Cheap Tickets to {{ucfirst($destination->city??'')}}, {{ucfirst($destination->country??'')}}, Cheap Flights {{ucfirst($destination->city??'')}}, {{ucfirst($destination->country??'')}}">
        <meta name="robots" content="index, follow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="English">
        <title>Cheap Flights to {{ucfirst($destination->city??'')}}, {{ucfirst($destination->country??'')}} | Cheap Flights Tickets to {{ucfirst($destination->city??'')}}, {{ucfirst($destination->country??'')}}  | Book Flights Tickets to {{ucfirst($destination->city??'')}}, {{ucfirst($destination->country??'')}}"</title>
    @endpush

    @push('styles')
        <link rel="stylesheet" href="{{asset('css/search-flights.css')}}">
    @endpush

    <div class="container-fluid px-0">
        <x-hero-banner></x-hero-banner>
    </div>

    <div id="searchFlights" class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="h2 text-theme-primary text-capitalize text-center my-5 pb-3 border-bottom page-title">
                    Flights @if(!empty($destination->city)) to {{$destination->city ??''}} @endif
                </h1>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            @if(!empty($flights))
                                @foreach($flights as $flight)
                                    <div class="col-12 mb-3">
                                        <div class="card card-body shadow border-0">
                                            <div class="row">
                                                <div class="col-12 col-lg mb-3 mb-lg-0">
                                                    <p>Leaving From: <span class="font-weight-bold">
                                                            {{$flight->sourceCity??''}}
                                                        </span>
                                                    </p>
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="iata-code mb-1">
                                                                {{$flight->Source}}
                                                            </p>
                                                            <p class="font-weight-bold mb-1">
                                                                {{flightGoDepartTime($flight)}}
                                                            </p>
                                                            <p class="small mb-0">
                                                                {{cabinType($flight->Cabin)}}
                                                            </p>
                                                        </div>
                                                        <div class="col px-0">
                                                            <p class="small text-center">
                                                                {{stopOrDirect($flight->Direct)}}
                                                            </p>
                                                            <div
                                                                class="d-flex justify-content-center align-items-center mb-1">
                                                                <i class="fas fa-plane text-theme-secondary"></i>
                                                                <hr class="flex-fill flight-route"/>
                                                                @if(stopOrDirect($flight->Direct) !== 'DIRECT')
                                                                    <i class="far fa-circle text-theme-secondary"></i>
                                                                    <hr class="flex-fill flight-route"/>
                                                                @endif
                                                                <i class="fas fa-map-marker-alt text-theme-secondary"></i>
                                                            </div>
                                                            <p class="x-small text-center text-muted">Fly With</p>
                                                        </div>
                                                        <div class="col">
                                                            <p class="iata-code mb-1 text-right">
                                                                {{flightDestination($flight)}}
                                                            </p>
                                                            <p class="font-weight-bold text-right mb-0">
                                                                {{flightArriveGoTime($flight)}}
                                                            </p>
                                                            <div class="text-right">
                                                                <img class="img-fluid mx-auto"
                                                                     src="{{asset("/images/airlines/$flight->Carrier.gif")}}"
                                                                     alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($flight->Journey == "R")
                                                    <div class="col-12 col-lg mb-3 mb-lg-0 border-right border-left">
                                                        <p>Returning From: <span class="font-weight-bold">
                                                            {{$flight->destinationCity??''}}
                                                        </span>
                                                        </p>
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="iata-code mb-1">{{$flight->Destination}}</p>
                                                                <p class="font-weight-bold mb-1">
                                                                    {{flightInDepartTime($flight)}}
                                                                </p>
                                                                <p class="small mb-1">
                                                                    {{cabinType($flight->Cabin)}}
                                                                </p>
                                                            </div>
                                                            <div class="col px-0">
                                                                <p class="small text-center">
                                                                    {{stopOrDirect($flight->Direct)}}
                                                                </p>
                                                                <div
                                                                    class="d-flex justify-content-center align-items-center">
                                                                    <i class="fas fa-plane text-theme-secondary"></i>
                                                                    <hr class="flex-fill flight-route"/>
                                                                    @if(stopOrDirect($flight->Direct) !== 'DIRECT')
                                                                        <i class="far fa-circle text-theme-secondary"></i>
                                                                        <hr class="flex-fill flight-route"/>
                                                                    @endif
                                                                    <i class="fas fa-map-marker-alt text-theme-secondary"></i>
                                                                </div>
                                                                <p class="x-small text-center text-muted">Fly With</p>
                                                            </div>
                                                            <div class="col">
                                                                <p class="iata-code text-right mb-1">
                                                                    {{flightArrivalInSource($flight)}}
                                                                </p>
                                                                <p class="font-weight-bold text-right mb-1">
                                                                    {{flightArriveInTime($flight)}}
                                                                </p>
                                                                <div class="text-right">
                                                                    <img class="img-fluid mx-auto"
                                                                         src="{{asset("/images/airlines/$flight->Carrier.gif")}}"
                                                                         alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div
                                                    class="col-12 col-lg-3 {{$flight->Journey == "O"?'border-left':''}}">
                                                    <p class="text-center h3 price-info">
                                                        &pound;{{$flight->adult_price??''}}<sup
                                                            class="text-danger">*</sup><sub>pp</sub>
                                                    </p>
                                                    <p class="x-small text-center text-danger mb-1">
                                                        <sup>&ast;</sup>Subject to availability.
                                                    </p>
                                                    <a class="btn btn-sm btn-phn btn-block rounded-pill"
                                                       href="tel:{{env('CONTACT_PHONE_ACTUAL')}}">
                                                        <i class="fas fa-phone-alt"></i>&nbsp;&nbsp;{{env('CONTACT_PHONE')}}
                                                    </a>
                                                    <a href="https://api.whatsapp.com/send?l=en&phone={{env('CONTACT_WHATSAPP_ACTUAL')}}"
                                                       class="btn btn-sm btn-whtsapp btn-block rounded-pill">
                                                        <i class="fab fa-whatsapp"></i>&nbsp;&nbsp;{{env('CONTACT_WHATSAPP')}}
                                                    </a>

                                                    <a class="btn btn-sm btn-link btn-block text-dark text-decoration-none rounded-pill"
                                                       data-toggle="collapse" href="#flightDetails{{$flight->ID}}"
                                                       role="button" aria-expanded="false"
                                                       aria-controls="collapseExample">
                                                        <i class="fas fa-plus"></i>&nbsp;&nbsp;Flight Details
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col px-0">
                                                    <div class="collapse" id="flightDetails{{$flight->ID}}">
                                                        <div class="card card-body px-3">
                                                            <div class="row">
                                                                <div
                                                                    class="col-12 {{$flight->Journey == "R"?'col-lg-6':'col-lg-12'}} order-1">
                                                                    <p class="font-weight-bold text-center">Outbound</p>
                                                                </div>
                                                                @if($flight->Journey == "R")
                                                                    <div class="col-12 col-lg-6 order-3 order-lg-2">
                                                                        <p class="font-weight-bold text-center">
                                                                            Inbound
                                                                        </p>
                                                                    </div>
                                                                @endif
                                                                <div
                                                                    class="col-12 {{$flight->Journey == "R"?'col-lg-6':'col-lg-12'}} order-2 order-lg-3 mb-5 mb-lg-0">
                                                                    <div
                                                                        class="row {{$flight->Journey == "R" && $flight->Direct == "N"?'mb-3 pb-3 border-bottom':''}}">
                                                                        <div class="col">
                                                                            <p class="mb-2 iata-code">
                                                                                {{$flight->Source}}
                                                                            </p>
                                                                            <p class="small font-weight-bold mb-2">
                                                                                {{$flight->go_dep_time}}
                                                                            </p>
                                                                            <p class="x-small text-muted mb-2">
                                                                                {{date('d M Y', strtotime(str_replace('/', '-', $flight->DepartDate)))}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p class="x-small text-muted mb-0 text-center">
                                                                                {{$flight->Carrier}}{{$flight->go_flight_no}}
                                                                            </p>
                                                                            <p class="x-small text-muted mb-1 text-center">
                                                                                <i class="far fa-clock"></i>&nbsp;&nbsp;{{$flight->go_duration}}
                                                                            </p>
                                                                            <div
                                                                                class="d-flex justify-content-center align-items-center">
                                                                                <i class="fas fa-circle xx-small text-theme-secondary"></i>
                                                                                <hr class="flex-fill flight-route"/>
                                                                                <i class="fas fa-plane text-theme-secondary"></i>
                                                                                <hr class="flex-fill flight-route"/>
                                                                                <i class="fas fa-circle xx-small text-theme-secondary"></i>
                                                                            </div>
                                                                            <div class="text-center">
                                                                                <img class="img-fluid"
                                                                                     src="{{asset("/images/airlines/$flight->Carrier.gif")}}"
                                                                                     alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p class="mb-2 iata-code text-right">
                                                                                {{$flight->go_arrival}}
                                                                            </p>
                                                                            <p class="small font-weight-bold mb-2 text-right">
                                                                                {{$flight->go_arr_time}}
                                                                            </p>
                                                                            <p class="x-small text-muted mb-2 text-right">
                                                                                {{date('d M Y', strtotime("+$flight->AdddayA day",strtotime(str_replace('/', '-', $flight->DepartDate))))}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @if($flight->Journey == "R" && $flight->Direct == "N")
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <p class="mb-2 iata-code">
                                                                                    {{$flight->go_via_dep}}
                                                                                </p>
                                                                                <p class="small font-weight-bold mb-2">
                                                                                    {{$flight->go_via_dep_time}}
                                                                                </p>
                                                                                <p class="x-small text-muted mb-2">
                                                                                    {{date('d M Y', strtotime("+$flight->AdddayB day",strtotime(str_replace('/', '-', $flight->DepartDate))))}}
                                                                                </p>
                                                                            </div>
                                                                            <div class="col">
                                                                                <p class="x-small text-muted mb-0 text-center">
                                                                                    {{$flight->go_via_airline}}{{$flight->go_via_flight_no}}
                                                                                </p>
                                                                                <p class="x-small text-muted mb-1 text-center">
                                                                                    <i class="far fa-clock"></i>&nbsp;&nbsp;{{$flight->go_via_duration}}
                                                                                </p>
                                                                                <div
                                                                                    class="d-flex justify-content-center align-items-center">
                                                                                    <i class="fas fa-circle xx-small text-theme-secondary"></i>
                                                                                    <hr class="flex-fill flight-route"/>
                                                                                    <i class="fas fa-plane text-theme-secondary"></i>
                                                                                    <hr class="flex-fill flight-route"/>
                                                                                    <i class="fas fa-circle xx-small text-theme-secondary"></i>
                                                                                </div>
                                                                                <div class="text-center">
                                                                                    <img class="img-fluid"
                                                                                         src="{{asset("/images/airlines/$flight->go_via_airline.gif")}}"
                                                                                         alt="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <p class="mb-2 iata-code text-right">
                                                                                    {{$flight->go_via_arr}}
                                                                                </p>
                                                                                <p class="small font-weight-bold mb-2 text-right">
                                                                                    {{$flight->go_via_arr_time}}
                                                                                </p>
                                                                                <p class="x-small text-muted mb-2 text-right">
                                                                                    {{date('d M Y', strtotime("+$flight->AdddayC day",strtotime(str_replace('/', '-', $flight->DepartDate))))}}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                @if($flight->Journey == "R")
                                                                    <div class="col-12 col-lg-6 order-4 border-left">
                                                                        <div
                                                                            class="row {{$flight->Direct=='N'?'mb-3 pb-3 border-bottom':''}}">
                                                                            <div class="col">
                                                                                <p class="mb-2 iata-code">
                                                                                    {{$flight->Destination}}
                                                                                </p>
                                                                                <p class="small font-weight-bold mb-2">
                                                                                    {{$flight->in_dep_time}}
                                                                                </p>
                                                                                <p class="x-small text-muted mb-2">
                                                                                    {{date('d M Y', strtotime(str_replace('/', '-', $flight->ReturnDate)))}}
                                                                                </p>
                                                                            </div>
                                                                            <div class="col">
                                                                                <p class="x-small text-muted mb-0 text-center">
                                                                                    {{$flight->in_airline}}{{$flight->in_flight_no}}
                                                                                </p>
                                                                                <p class="x-small text-muted mb-1 text-center">
                                                                                    <i class="far fa-clock"></i>&nbsp;&nbsp;{{$flight->in_duration}}
                                                                                </p>
                                                                                <div
                                                                                    class="d-flex justify-content-center align-items-center">
                                                                                    <i class="fas fa-circle xx-small text-theme-secondary"></i>
                                                                                    <hr class="flex-fill flight-route"/>
                                                                                    <i class="fas fa-plane text-theme-secondary"></i>
                                                                                    <hr class="flex-fill flight-route"/>
                                                                                    <i class="fas fa-circle xx-small text-theme-secondary"></i>
                                                                                </div>
                                                                                <div class="text-center">
                                                                                    <img class="img-fluid"
                                                                                         src="{{asset("/images/airlines/$flight->in_airline.gif")}}"
                                                                                         alt="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <p class="mb-2 iata-code text-right">
                                                                                    {{$flight->in_arrival}}
                                                                                </p>
                                                                                <p class="small font-weight-bold mb-2 text-right">
                                                                                    {{$flight->in_arr_time}}
                                                                                </p>
                                                                                <p class="x-small text-muted mb-2 text-right">
                                                                                    {{date('d M Y', strtotime("+$flight->AdddayD day",strtotime(str_replace('/', '-', $flight->ReturnDate))))}}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        @if($flight->Direct == "N")
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <p class="mb-2 iata-code">
                                                                                        {{$flight->in_via_departure}}
                                                                                    </p>
                                                                                    <p class="small font-weight-bold mb-2">
                                                                                        {{$flight->in_via_dep_time}}
                                                                                    </p>
                                                                                    <p class="x-small text-muted mb-2">
                                                                                        {{date('d M Y', strtotime("+$flight->AdddayE day",strtotime(str_replace('/', '-', $flight->ReturnDate))))}}
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <p class="x-small text-muted mb-0 text-center">
                                                                                        {{$flight->in_via_airline}}{{$flight->in_via_flight_no}}
                                                                                    </p>
                                                                                    <p class="x-small text-muted mb-1 text-center">
                                                                                        <i class="far fa-clock"></i>&nbsp;&nbsp;{{$flight->in_via_duration}}
                                                                                    </p>
                                                                                    <div
                                                                                        class="d-flex justify-content-center align-items-center">
                                                                                        <i class="fas fa-circle xx-small text-theme-secondary"></i>
                                                                                        <hr class="flex-fill flight-route"/>
                                                                                        <i class="fas fa-plane text-theme-secondary"></i>
                                                                                        <hr class="flex-fill flight-route"/>
                                                                                        <i class="fas fa-circle xx-small text-theme-secondary"></i>
                                                                                    </div>
                                                                                    <div class="text-center">
                                                                                        <img class="img-fluid"
                                                                                             src="{{asset("/images/airlines/$flight->in_via_airline.gif")}}"
                                                                                             alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <p class="mb-2 iata-code text-right">
                                                                                        {{$flight->in_via_arrival}}
                                                                                    </p>
                                                                                    <p class="small font-weight-bold mb-2 text-right">
                                                                                        {{$flight->in_via_arr_time}}
                                                                                    </p>
                                                                                    <p class="x-small text-muted mb-2 text-right">
                                                                                        {{date('d M Y', strtotime("+$flight->AdddayF day",strtotime(str_replace('/', '-', $flight->ReturnDate))))}}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h3 class="h2 text-theme-primary">No flights found ...</h3>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <x-flights.enquiry>
                            <div class="form-row d-none">
                                <div class="col form-group">
                                    <input type="text" class="form-control form-control-sm"
                                           name="source"
                                           value="{{Str::upper(app('request')->input('source'))}}">
                                </div>
                            </div>
                            <div class="form-row d-none">
                                <div class="col form-group">
                                    <input type="text" class="form-control form-control-sm"
                                           name="destination"
                                           value="{{Str::upper(app('request')->input('destination'))}}">
                                </div>
                            </div>
                            <div class="form-row d-none">
                                <div class="col form-group">
                                    <input type="text" class="form-control form-control-sm"
                                           name="departDate"
                                           value="{{Str::upper(app('request')->input('departDate'))}}">
                                </div>
                            </div>
                            <div class="form-row d-none">
                                <div class="col form-group">
                                    <input type="text" class="form-control form-control-sm"
                                           name="returnDate"
                                           value="{{Str::upper(app('request')->input('returnDate'))}}">
                                </div>
                            </div>
                            <div class="form-row d-none">
                                <div class="col form-group">
                                    <input type="text" class="form-control form-control-sm"
                                           name="adults"
                                           value="{{Str::upper(app('request')->input('adults'))}}">
                                </div>
                            </div>
                            <div class="form-row d-none">
                                <div class="col form-group">
                                    <input type="text" class="form-control form-control-sm"
                                           name="children"
                                           value="{{Str::upper(app('request')->input('children'))}}">
                                </div>
                            </div>
                            <div class="form-row d-none">
                                <div class="col form-group">
                                    <input type="text" class="form-control form-control-sm"
                                           name="infants"
                                           value="{{Str::upper(app('request')->input('infants'))}}">
                                </div>
                            </div>
                            <div class="form-row d-none">
                                <div class="col form-group">
                                    <input type="text" class="form-control form-control-sm"
                                           name="cabin"
                                           value="{{Str::upper(app('request')->input('cabin'))}}">
                                </div>
                            </div>
                            <div class="form-row d-none">
                                <div class="col form-group">
                                    <input type="text" class="form-control form-control-sm"
                                           name="carrier"
                                           value="{{Str::upper(app('request')->input('carrier'))}}">
                                </div>
                            </div>
                        </x-flights.enquiry>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <x-home.widgets.why-book-with-us></x-home.widgets.why-book-with-us>
</x-layout>
