<div class="card bg-theme-secondary-alpha border-radius-10 border-0 mb-3">
    <div class="card-body shadow border-radius-10">
        <form id="flightsEnquiryForm" method="post">
            <div class="form-row">
                <div class="col-12">
                    <label>First Name</label>
                </div>
                <div class="col form-group">
                    <input type="text" class="form-control form-control-lg border-radius-10" minlength="3" maxlength="250"
                           id="fname" name="fname" placeholder="First Name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <label>Last Name</label>
                </div>
                <div class="col form-group">
                    <input type="text" class="form-control form-control-lg border-radius-10" minlength="3" maxlength="250"
                           id="lname" name="lname" placeholder="Last Name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <label>E-MAIL</label>
                </div>
                <div class="col form-group">
                    <input type="email" class="form-control form-control-lg border-radius-10" minlength="5" maxlength="250"
                           id="email" name="email" placeholder="Email"
                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <label>Contact Number</label>
                </div>
                <div class="col form-group">
                    <input type="text" class="form-control form-control-lg border-radius-10" minlength="10" maxlength="13"
                           id="phone" name="phone" placeholder="Phone Number" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <label>Query</label>
                </div>
                <div class="col form-group">
                    <textarea class="form-control form-control-lg border-radius-10 resize-none" rows="4"
                              id="query" name="query" placeholder="Type your valuable query description here ..."
                              maxlength="2500"></textarea>
                </div>
            </div>
            {{$slot}}
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
                            </a>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div id="captchaErrors" class="col-12">
                    <ul class="pl-3"></ul>
                </div>
                <div class="col-12">
                    <button class="btn btn-lg btn-theme-default btn-block border-radius-10" type="submit">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('customScripts')
    <script type="text/javascript" src="{{asset('/js/flights-enquiry-form.js')}}"></script>
@endpush
