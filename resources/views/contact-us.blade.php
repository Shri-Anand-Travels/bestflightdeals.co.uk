<x-layout>
    @push('metaTags')
        <title>Contact us - BestFlightDeals UK</title>
    @endpush
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="h2 text-center page-heading my-5">Contact Us</h1>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card card-body border-0 shadow bg-theme-secondary-alpha">
                    <p class="text-theme-primary">
                        Send your enquiry to us and one of our Travel expert will get in touch with you shortly.
                    </p>
                    <form id="contactForm" method="post">
                        <div class="form-row">
                            <div class="form-group col">
                                <input class="form-control form-control-lg border-0 shadow-sm" type="text" name="name"
                                       placeholder="User Name" required minlength="3" maxlength="250"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input class="form-control form-control-lg border-0 shadow-sm" type="email" name="email"
                                       placeholder="Email" minlength="5" maxlength="250"
                                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input class="form-control form-control-lg border-0 shadow-sm" type="text" name="phone"
                                       placeholder="Phone Number" minlength="10" maxlength="13" required/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <textarea class="form-control form-control-lg border-0 shadow-sm resize-none" type="text" name="query"
                                          maxlength="2500" rows="4"
                                          placeholder="Please describe your opinion here ..."></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="privacyPolicyTermCondition"
                                           required name="accept_privacy"/>
                                    <label class="custom-control-label small pt-1" for="privacyPolicyTermCondition">
                                        I hereby accept the <a class="text-decoration-none text-dark font-weight-bold"
                                                               href="{{\Illuminate\Support\Facades\URL::to('/privacy-policy')}}">
                                            Privacy Policy
                                        </a>
                                        and <a class="text-decoration-none text-dark font-weight-bold"
                                               href="{{\Illuminate\Support\Facades\URL::to('/terms-and-conditions')}}">
                                            Terms and Conditions
                                        </a>.
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div id="captchaErrors" class="col-12">
                                <ul class="pl-3"></ul>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-lg btn-theme-default btn-block" type="submit">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('customScripts')
        <script type="text/javascript" src="{{asset('/js/contact-form.js')}}"></script>
    @endpush


    <x-home.widgets.why-book-with-us></x-home.widgets.why-book-with-us>
</x-layout>
