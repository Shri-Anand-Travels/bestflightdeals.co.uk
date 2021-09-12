<nav id="topNav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <div class="container">
        <a class="navbar-brand" href="{{URL::to('/')}}">
            <img loading="lazy" class="img-fluid" src="{{asset('/images/logo.svg')}}" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                <li class="nav-item {{Request::path() == '/' ?'active':''}}">
                    <a class="nav-link px-3" href="{{URL::to('/')}}">
                        Home <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item {{Request::path() == 'flights' ?'active':''}}">
                    <a class="nav-link px-3" href="{{URL::to('/flights')}}">Flights</a>
                </li>
                <li class="nav-item {{Request::path() == 'holidays' ?'active':''}}">
                    <a class="nav-link px-3" href="{{URL::to('/holidays')}}">Holidays</a>
                </li>
                <li class="nav-item {{Request::path() == 'covid-19-update' ?'active':''}}">
                    <a class="nav-link px-3" href="{{URL::to('/covid-19-update')}}">Covid Update</a>
                </li>
                <li class="nav-item {{Request::path() == 'about-us' ?'active':''}}">
                    <a class="nav-link px-3" href="{{URL::to('/about-us')}}">About Us</a>
                </li>
            </ul>
            <div class="navbar-text">
                <div id="headerContact" class="d-flex flex-column">
                    <a data-phone class="text-decoration-none ml-3 ml-lg-0 mb-1" href="tel:{{env('CONTACT_PHONE_ACTUAL')}}">
                        <i class="fas fa-phone-alt"></i>&nbsp;{{env('CONTACT_PHONE')}}
                    </a>
                    <a data-whatsapp class="text-decoration-none ml-3 ml-lg-0"
                       href="https://api.whatsapp.com/send?l=en&phone={{env('CONTACT_WHATSAPP_ACTUAL')}}">
                        <i class="fab fa-whatsapp"></i>&nbsp;{{env('CONTACT_WHATSAPP')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
