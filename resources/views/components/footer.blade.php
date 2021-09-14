@php
    $flightDestinations = (new App\Http\Controllers\CheapFlightsControllers)->footerFlightDestinations()
@endphp

<div id="footerWrapper" class="container-fluid">
    <div id="footer" class="row bg-dark py-4">
        <div class="col-12">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <div class="row">
                            <div class="col-12 mb-1">
                                <p class="font-weight-bold block-title">Best Flight Deals</p>
                            </div>
                            <div class="col-12">
                                <ul class="menu-section-block-list">
                                    <li>
                                        <a class="text-white text-decoration-none small" href="/">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-white text-decoration-none small" href="/about-us">
                                            About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-white text-decoration-none small" href="/contact-us">
                                            Contact Us
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-white text-decoration-none small" href="/terms-and-conditions">
                                            Terms and Conditions
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-white text-decoration-none small" href="/privacy-policy">
                                            Privacy Policy
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-white text-decoration-none small" href="/covid-19-update">
                                            Covid Update
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-white text-decoration-none small" href="/book-with-confidence">
                                            Book With Confidence
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="row justify-content-end">
                            <div class="col-12 mb-1">
                                <p class="font-weight-bold block-title">Flights</p>
                            </div>
                            @foreach($flightDestinations as $flightDestination)
                                <div class="col-6 menu-section-block-list">
                                    <a class="text-white text-decoration-none small"
                                       href="{{URL::to('flights-to-'.strtolower($flightDestination->city))}}">
                                        Flight To {{$flightDestination->city}}
                                    </a>
                                </div>
                            @endforeach
                            <div class="col-6 menu-section-block-list">
                                <a class="text-white text-decoration-none small more-link"
                                   href="{{URL::to('/flights')}}">
                                    More Flights…
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-12 mb-1">
                                <p class="font-weight-bold block-title">Get in Touch</p>
                            </div>
                            <div class="col-12">
                                <ul class="menu-section-block-list">
                                    <li class="mb-3">
                                        <a class="text-white text-decoration-none small d-flex align-items-center"
                                           href="mailto:sales@bestflightdeals.co.uk">
                                            <div class="get-in-icon">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            sales@bestflightdeals.co.uk
                                        </a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="text-white text-decoration-none small d-flex align-items-center"
                                           href="tel:{{env('CONTACT_PHONE_ACTUAL')}}">
                                            <div class="get-in-icon">
                                                <i class="fas fa-phone-alt"></i>
                                            </div>
                                            {{env('CONTACT_PHONE')}}
                                        </a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="text-white text-decoration-none small d-flex align-items-center"
                                           href="https://api.whatsapp.com/send?l=en&phone={{env('CONTACT_WHATSAPP_ACTUAL')}}">
                                            <div class="get-in-icon whatsapp-bg">
                                                <i class="fab fa-whatsapp"></i>
                                            </div>
                                            {{env('CONTACT_WHATSAPP')}}
                                        </a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="text-white text-decoration-none small d-flex align-items-center"
                                           href="https://goo.gl/maps/7yNdgkrwLBrEsvTG9">
                                            <div class="get-in-icon">
                                                <i class="fas fa-map-marker-alt mx-2"></i>
                                            </div>
                                            58, Uxbridge, UB10 9HX, England
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 px-0">
            <div class="separator border-bottom my-3"></div>
        </div>
        <div class="col-12">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="x-small mb-1 text-muted">
                            Find cheap flight tickets for all the top international airlines routes around the world.
                            Booking with Bestflightdeals is the most suitable way to create memorable experience. Make
                            sure you don’t miss it.
                        </p>
                        <p class="x-small mb-1 text-muted">
                            Mentioned prices are per person and are for electronic tickets only which include all taxes
                            & fees in GBP. Bestflightdeals attempt to get accurate prices and fees; but the prices may
                            be subject to last minute changes over which we have no control.
                        </p>
                        <p class="x-small mb-1 text-muted">
                            We do not claim that we are airlines. Brands displayed on our pages are owned by the
                            respective brand owners. *No hidden cost or extra fee on credit cards"
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 px-0">
            <div class="separator border-bottom my-3"></div>
        </div>
        <div class="col-12">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="small mb-0 text-white">
                            Bestflightdeals protects your privacy and security. &copy; {{now()->year}} All rights
                            reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
