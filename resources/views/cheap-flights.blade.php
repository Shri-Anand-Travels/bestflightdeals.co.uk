<x-layout title="Flights {{(!empty($destination))? 'to ' .ucfirst($destination) :''}}">

    @push('metaTags')
        <meta name="title"
              content="Cheap Flights to {{ucfirst($destination??'')}}, {{ucfirst($country??'')}} | Cheap Flights Tickets to {{ucfirst($destination??'')}}, {{ucfirst($country??'')}} | Book Flights Tickets to {{ucfirst($destination??'')}}, {{ucfirst($country??'')}}">
        <meta name="description"
              content="Cheap tickets on {{ucfirst($destination??'')}}, {{ucfirst($country??'')}} flights. BestFlightDeals offers cheap flights to with price match guaranteed , low deposit & easy monthly payment options.">
        <meta name="keywords"
              content="Flights to {{ucfirst($destination??'')}}, {{ucfirst($country??'')}}, Cheap Tickets to {{ucfirst($destination??'')}}, {{ucfirst($country??'')}}, Cheap Flights {{ucfirst($destination??'')}}, {{ucfirst($country??'')}}">
        <meta name="robots" content="index, follow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="English">
        <title>Cheap Flights to {{ucfirst($destination??'')}}, {{ucfirst($country??'')}} | Cheap Flights Tickets to {{ucfirst($destination??'')}}, {{ucfirst($country??'')}} | Book Flights Tickets to {{ucfirst($destination??'')}}, {{ucfirst($country??'')}}</title>
    @endpush

    @push('styles')
        <link rel="stylesheet" href="{{asset('css/cheap-flights.css')}}">
    @endpush

    <div class="container-fluid px-0">
        <x-hero-banner destination="{{$destination}}" iataDestination="{{$iataDestination}}"></x-hero-banner>
    </div>

    <div id="cheapFlights" class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="h2 text-theme-primary text-capitalize text-center my-5 pb-3 border-bottom page-title">
                    Cheap Flights @if($destination) to {{$destination}} @endif
                </h1>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-9">
                        @if($flights)
                            <div class="row">
                                @foreach($flights as $flight)
                                    <div class="col-12 mb-3">
                                        <div class="card card-body shadow border-0">
                                            <div class="row">
                                                <div class="col-12 col-lg mb-3 mb-lg-0">
                                                    <p>Leaving From: <span class="font-weight-bold">
                                                            {{$flight->sourceAirport->city??''}}</span></p>
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="iata-code">{{$flight->Source}}</p>
                                                            <p class="x-small text-muted">Fly With</p>
                                                        </div>
                                                        <div class="col px-0">
                                                            <p class="small text-center">{{$flight->Journey}}</p>
                                                            <div
                                                                class="d-flex justify-content-center align-items-center">
                                                                <i class="fas fa-plane text-theme-secondary"></i>
                                                                <hr class="flex-fill mx-1 flight-route"/>
                                                                @if($flight->Journey !== 'Direct')
                                                                    <i class="far fa-circle text-theme-secondary"></i>
                                                                    <hr class="flex-fill mx-1 flight-route"/>
                                                                @endif
                                                                <i class="fas fa-map-marker-alt text-theme-secondary"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p class="iata-code text-right">{{$flight->Destination}}</p>
                                                            <div class="text-right">
                                                                <img class="img-fluid mx-auto"
                                                                     src="{{asset("/images/airlines/$flight->aairlinecode.gif")}}"
                                                                     alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg mb-3 mb-lg-0 border-right border-left">
                                                    <p>Returning From: <span
                                                            class="font-weight-bold">{{$flight->destinationAirport->city??''}}</span>
                                                    </p>
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="iata-code">{{$flight->Destination}}</p>
                                                            <p class="x-small text-muted">Fly With</p>
                                                        </div>
                                                        <div class="col px-0">
                                                            <p class="small text-center">{{$flight->Journey}}</p>
                                                            <div
                                                                class="d-flex justify-content-center align-items-center">
                                                                <i class="fas fa-plane text-theme-secondary"></i>
                                                                <hr class="flex-fill mx-1 flight-route"/>
                                                                @if($flight->Journey !== 'Direct')
                                                                    <i class="far fa-circle text-theme-secondary"></i>
                                                                    <hr class="flex-fill mx-1 flight-route"/>
                                                                @endif
                                                                <i class="fas fa-map-marker-alt text-theme-secondary"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p class="iata-code text-right">{{$flight->Source}}</p>
                                                            <div class="text-right">
                                                                <img class="img-fluid mx-auto"
                                                                     src="{{asset("/images/airlines/$flight->aairlinecode.gif")}}"
                                                                     alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3">
                                                    <p class="text-center h3 price-info">
                                                        &pound;{{$flight->Adults??''}}<sup
                                                            class="text-danger">*</sup><sub>pp</sub>
                                                    </p>
                                                    <p class="x-small text-center text-danger">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if($destinations)
                            @foreach($destinations as $destination)
                                <div class="card card-body shadow border-0 mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <p class="h5">
                                                Cheap Flights to <span class="h4 text-theme-primary">
                                                    {{$destination->destination_city}}
                                                </span> starting from <span class="h4 text-theme-primary">
                                                    &pound;&nbsp;{{$destination->Adults}}
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <a class="btn btn-link btn-block btn-sm"
                                               href="{{URL::to('/flights-to-'.str_replace(' ','-', strtolower($destination->destination_city)))}}">
                                                Visit Page&nbsp;<i class="fas fa-link"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-lg-3">
                        <x-flights.enquiry>
                            <div class="form-row d-none">
                                <div class="col form-group">
                                    <input type="text" class="form-control form-control-sm border-radius-10"
                                           name="source" value="LON">
                                </div>
                            </div>
                            <div class="form-row d-none">
                                <div class="col form-group">
                                    <input type="text" class="form-control form-control-sm border-radius-10"
                                           name="destination" value="{{$iataDestination}}">
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

