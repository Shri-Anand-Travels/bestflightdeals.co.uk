@php
    $flightDestinations = (new App\Http\Controllers\FlightsController())->homeWidgetTiles()
@endphp
<div class="container mt-3">
    <div class="form-row">
        <div class="col-12">
            <p class="h4 text-uppercase font-weight-bold block-title mb-4">Flight Deals</p>
        </div>
    </div>

    <div class="form-row">
        <div class="col">
            @foreach($flightDestinations as $destination => $flights)
                <p class="mb-3 text-capitalize font-weight-bold block-sub-title">{{$destination}}</p>
                <div class="owl-carousel owl-theme mb-5">
                    @foreach($flights as $flightDestination)
                        {{--            <div class="col-sm-6 col-lg-3 mb-3">--}}
                        <div class="card bg-dark text-white rounded-0 border-0 mx-1">

                            <img
                                src="{{asset("/images/flight/destination/".str_replace(' ','-', strtolower($flightDestination->destination_city)).".png")}}"
                                class="card-img rounded-0" alt="{{$flightDestination->destination_city}}">

                            <div class="card-img-overlay d-flex align-items-end py-0 px-3">
                                <div class="row flex-fill py-3 px-1 flight-book-details">
                                    <div class="col">
                                        <p class="mb-0">{{$flightDestination->destination_city}}</p>
                                        <p class="mb-0 xx-small">{{$flightDestination->cabin}} class</p>
                                        <p class="mb-0 font-weight-bold">&pound;&nbsp;{{$flightDestination->Adults}}</p>
                                    </div>
                                    <div class="col d-flex align-items-center">
{{--                                        <a href="{{URL::to("/flights-to-".str_replace(' ','-', strtolower($flightDestination->destination_city)))}}"--}}
                                        <a href="tel:{{env('CONTACT_PHONE_ACTUAL')}}"
                                           class="btn btn-sm btn-block btn-flight-card text-uppercase font-weight-bold">
                                            Call Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--            </div>--}}
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
