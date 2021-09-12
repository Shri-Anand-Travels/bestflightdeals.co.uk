<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div id="flight-enquiry-banner" class="col px-0">
                <img class="img-fluid" src="{{asset('/images/flight-enquiries.png')}}" alt=""/>
                <div class="display-content h-100 w-100">
                    <div class="row h-100 d-flex justify-content-start align-items-center no-gutters">
                        <div class="col-lg-6">
                            <h1 class="h1 text-theme-primary text-center">Call Now!</h1>
                            <a class="h1 text-theme-secondary text-decoration-none font-weight-bold"
                               href="tel:{{env('CONTACT_PHONE_ACTUAL')}}">
                                {{env('CONTACT_PHONE')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="flight-enquiry-wrapper" class="row py-5">
            <div class="col">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row h-100">
                                <div class="col-12">
                                    <p>
                                        Bestflightdeals have negotiated some of the most amazing flight deals just for
                                        your
                                        travel! Kindly call our friendly, experienced Holiday Advisors today to discuss
                                        further…
                                    </p>
                                </div>
                                <div class="col-12 py-3">
                                    <img class="img-fluid" src="{{asset('/images/plane.png')}}" alt=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <x-flights.enquiry></x-flights.enquiry>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <x-home.widgets.why-book-with-us></x-home.widgets.why-book-with-us>
        </div>
    </div>
</x-layout>
