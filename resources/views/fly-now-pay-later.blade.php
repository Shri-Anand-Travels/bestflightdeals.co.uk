<x-layout>
    @push('metaTags')
        <meta name="title" content="Book Flights Now Across The Globe And Pay Later With BestFlightDeals UK. Avail Fly Now Pay Later Option Now">
        <meta name="description" content="Get Best Deals At Price Match Guaranteed. Get Your Quote Right Now.">
        <title>Book Flights Now Across The Globe And Pay Later With BestFlightDeals UK. Avail Fly Now Pay Later Option Now</title>
    @endpush
    @push('styles')
        <link rel="stylesheet" href="{{asset('css/autocomplete.css')}}">
        <link rel="stylesheet" href="{{asset('css/fly-now-pay-later.css')}}">
    @endpush

    <div class="container-fluid">
        <div class="row">
            <div id="flight-enquiry-banner" class="col px-0">
                <img class="img-fluid" src="{{asset('/images/fly-now-pay-later-banner.png')}}" alt=""/>
                <div class="display-content h-100 w-100">
                    <div class="container h-100">
                        <div class="row no-gutters h-100 d-flex justify-content-start align-items-center">
                            <div class="col-lg-8">
                                <h1 class="h1 text-white text-left">Fly Now Pay Later Option:</h1>
                                <p class="h5 font-weight-normal text-white text-left">
                                    Makes it simpler than ever to book a holiday now and pay it off later.
                                </p>
                                <div class="d-flex justify-content-start align-items-start">
                                    <a class="h1 text-white text-decoration-none font-weight-bold text-left"
                                       href="tel:{{env('CONTACT_PHONE_ACTUAL')}}">
                                        <span class="font-weight-light">Call Now!</span> {{env('CONTACT_PHONE')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row py-5">
                <div class="col-12 mb-4">
                    <p>
                        The approval of your application depends on your financial circumstances and borrowing
                        history, so do the terms you may be offered.<br/>
                        Flex representative example: Cash price of a holiday £600, borrowing £600 over 12
                        months, you will repay in 12 monthly instalments of £50. Total amount payable is £702.
                        The total charge for credit is £102 as a one-off transaction fee. Representative APR is
                        42.4%.
                    </p>
                </div>

                <div class="col">
                    <div class="d-block text-center">
                        <img src="{{asset('/images/application.svg')}}">
                    </div>
                    <p class="text-center">
                        Apply your application
                    </p>
                </div>
                <div class="col">
                    <div class="d-block text-center">
                        <img src="{{asset('/images/call-support.svg')}}">
                    </div>
                    <p class="text-center">
                        Get a quick call from out<br/>
                        24*7 travel expert
                    </p>
                </div>
                <div class="col">
                    <div class="d-block text-center">
                        <img src="{{asset('/images/relax.svg')}}">
                    </div>
                    <p class="text-center">
                        Sit & Relax, book your holidays & pay later in<br/> easy monthly installment
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card card-body border-0 shadow mb-5 p-4 border-radius-10 bg-theme-secondary-alpha">
                        <form id="flyNowPayLater" method="post">
                            <div class="form-row">
                                <div class="form-group col-12 col-md">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control form-control-lg border-0 shadow-sm"
                                           minlength="3"
                                           maxlength="250"
                                           id="name" name="name" placeholder="Name" required>
                                </div>
                                <div class="form-group col-12 col-md">
                                    <label for="phone">Contact Number</label>
                                    <input type="text" class="form-control form-control-lg border-0 shadow-sm"
                                           minlength="10"
                                           maxlength="13"
                                           id="phone" name="phone" placeholder="Phone Number" required>
                                </div>
                                <div class="form-group col-12 col-md">
                                    <label for="inputEmail4">E-mail</label>
                                    <input type="email" class="form-control form-control-lg border-0 shadow-sm"
                                           minlength="5"
                                           maxlength="250"
                                           id="email" name="email" placeholder="Email"
                                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 col-md">
                                    <label for="name">Travel Destination</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white shadow-sm border-0"
                                                  id="source-group-icon">
                                                <i class="fas fa-plane-arrival text-theme-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="destination" name="destination" placeholder="Destination"
                                               class="form-control form-control-lg shadow-sm border-0"
                                               autocomplete="off"
                                               value="{{Str::upper(app('request')->input('destination')??'')}}"
                                               aria-label="Source" aria-describedby="source-group-icon" required/>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-md">
                                    <label for="phone">Contact Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white shadow-sm border-0" id="depart-date">
                                                <i class="fas fa-calendar-alt text-theme-primary"></i>
                                            </span>
                                        </div>
                                        <input name="departDate"
                                               class="datepicker form-control form-control-lg border-0 shadow-sm"
                                               placeholder="Depart Date" autocomplete="off"
                                               value="{{app('request')->input('departDate')??''}}"
                                               aria-label="Source" aria-describedby="depart-date"/>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-md">
                                    <label for="inputEmail4">Number Of Travelers</label>
                                    <select class="form-control form-control-lg border-0 shadow-sm" name="adults">
                                        @for ($adult = 1; $adult < 10; $adult++)
                                            <option value="{{$adult}}"
                                                {{(app('request')->input('adults')==$adult||$adult == 1)?'selected':''}}>
                                                {{$adult}} {{$adult > 1 ? 'Adults':'Adult'}}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 col-md">
                                    <label for="query">Name</label>
                                    <textarea
                                        class="form-control form-control-lg border-0 shadow-sm border-radius-10 resize-none"
                                        rows="4"
                                        id="query" name="query"
                                        placeholder="Type your valuable query description here ..."
                                        maxlength="2500"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                               id="privacyPolicyTermCondition"
                                               required name="accept_privacy"/>
                                        <label class="custom-control-label small pt-1"
                                               for="privacyPolicyTermCondition">
                                            I hereby accept the <a
                                                class="text-decoration-none text-dark font-weight-bold"
                                                href="{{\Illuminate\Support\Facades\URL::to('/privacy-policy')}}">
                                                Privacy Policy
                                            </a> and authorize Bestflightdeals and its representatives to contact me.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-4 offset-8">
                                    <button type="submit"
                                            class="btn btn-lg btn-theme-default btn-block border-radius-10">
                                        ENQUIRE NOW
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <x-home.widgets.why-book-with-us></x-home.widgets.why-book-with-us>
        </div>
    </div>

    @push('customScripts')
        <script type="text/javascript" src="{{asset('/js/autocomplete.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/fly-now-pay-later.js')}}"></script>
    @endpush

</x-layout>
