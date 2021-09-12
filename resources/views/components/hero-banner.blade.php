@push('styles')
    <link rel="stylesheet" href="{{asset('css/autocomplete.css')}}">
    <link rel="stylesheet" href="{{asset('css/hero-banner.css')}}">
@endpush

<div id="flights-hero-banner" class="container-fluid">
    <div class="row">
        <div class="col-12 px-0">
            <img class="img-fluid" src="{{asset('/images/flights-hero-banner.jpg')}}" alt="hero banner">
        </div>
        <div class="col-12">
            <div class="container search-engine-wrapper">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <form id="search-engine" action="{{url('/search/flights')}}" method="get">
                            <div class="form-row">
                                <div class="form-group col-12 col-sm-6 col-lg-3">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="round-trip" name="journey" class="custom-control-input"
                                               value="R" {{app('request')->input('cabin')!='O'?'checked':''}}>
                                        <label class="custom-control-label trip-radio small" for="round-trip">Round
                                            Trip</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="oneway" name="journey" class="custom-control-input"
                                               value="O" {{app('request')->input('cabin')=='O'?'checked':''}}>
                                        <label class="custom-control-label trip-radio small" for="oneway">Oneway</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 col-sm-6 col-lg-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="source-group-icon">
                                                <i class="fas fa-plane-departure"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="source" name="source" placeholder="Source"
                                               class="form-control form-control-sm" autocomplete="off"
                                               value="{{Str::upper(app('request')->input('source')??'LON')}}"
                                               aria-label="Source" aria-describedby="source-group-icon" required/>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-sm-6 col-lg-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="source-group-icon">
                                                <i class="fas fa-plane-arrival"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="destination" name="destination" placeholder="Destination"
                                               class="form-control form-control-sm" autocomplete="off"
                                               value="{{Str::upper(app('request')->input('destination')??$iataDestination)}}"
                                               aria-label="Source" aria-describedby="source-group-icon" required/>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-sm-6 col-lg-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="depart-date">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input name="departDate" class="datepicker form-control form-control-sm"
                                               placeholder="Depart Date" autocomplete="off"
                                               value="{{app('request')->input('departDate')??''}}"
                                               aria-label="Source" aria-describedby="depart-date"/>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-sm-6 col-lg-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="return-date">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input name="returnDate" class="datepicker form-control form-control-sm"
                                               placeholder="Return Date" autocomplete="off"
                                               value="{{app('request')->input('returnDate')??''}}"
                                               aria-label="Source" aria-describedby="return-date"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 col-sm-6 col-lg-2">
                                    <select class="form-control form-control-sm" name="adults">
                                        @for ($adult = 1; $adult < 10; $adult++)
                                            <option value="{{$adult}}"
                                                {{(app('request')->input('adults')==$adult||$adult == 1)?'selected':''}}>
                                                {{$adult}} {{$adult > 1 ? 'Adults':'Adult'}}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group col-12 col-sm-6 col-lg-2">
                                    <select class="form-control form-control-sm" name="children">
                                        <option value="">Select Children</option>
                                        @for ($children = 1; $children < 10; $children++)
                                            <option value="{{$children}}"
                                                {{app('request')->input('children') == $children?'selected':''}}>
                                                {{$children}} Children
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group col-12 col-sm-4 col-lg-2">
                                    <select class="form-control form-control-sm" name="infants">
                                        <option value="">Select Infants</option>
                                        @for ($infant = 1; $infant < 10; $infant++)
                                            <option value="{{$infant}}"
                                                {{app('request')->input('infants') == $infant?'selected':''}}>
                                                {{$infant}} {{$infant > 1 ? 'Infants':'Infant'}}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group col-12 col-sm-4 col-lg-2">
                                    <select class="form-control form-control-sm" name="cabin">
                                        <option value="4" {{(app('request')->input('cabin')==4)?'selected':''}}>
                                            Economy
                                        </option>
                                        <option value="3" {{(app('request')->input('cabin')==3)?'selected':''}}>
                                            Premium Economy
                                        </option>
                                        <option value="2" {{(app('request')->input('cabin')==2)?'selected':''}}>
                                            Business
                                        </option>
                                        <option value="1" {{(app('request')->input('cabin')==1)?'selected':''}}>
                                            First Class
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-sm-4 col-lg-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="source-group-icon">
                                                <i class="fas fa-plane"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="carrier" name="carrier" placeholder="Carrier"
                                               class="form-control form-control-sm" autocomplete="off"
                                               value="{{Str::upper(app('request')->input('carrier')??'')}}"
                                               aria-label="Source" aria-describedby="source-group-icon"/>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-2">
                                    <button type="submit" class="btn btn-sm btn-primary btn-block text-uppercase">
                                        Search Flights
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('customScripts')
    <script type="text/javascript" src="{{asset('/js/autocomplete.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/flight-search-engine.js')}}"></script>
@endpush
