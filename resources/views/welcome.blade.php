<x-layout>

    @push('metaTags')
    <meta name="title" content="Book Flights & Hotels At Best Prices Around The World With Bestflightdeals">
    <meta name="description" content="Finding the best flight deals across the world , we at Bestflightdeals offers you deals with price match guaranteed, low deposit & easy monthly installments.  ">
    <meta name="keywords" content="Cheap Flights, Cheap Tickets, Cheap Airlines, Cheap flight tickets, Cheap Holidays, Cheap Hotels, Travel News, Travel Insurance, Flights Deals, Direct Flights Booking, Indirect Flights Booking, Discounted Flights, Cheap Offers, book cheap flight online">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    @endpush

    @push('styles')
        <link rel="stylesheet" href="{{asset('css/home.css')}}">
    @endpush

    <x-hero-banner></x-hero-banner>
    <x-home.widgets.flights></x-home.widgets.flights>
    <x-home.widgets.why-book-with-us></x-home.widgets.why-book-with-us>

    @push('customScripts')
        <script type="text/javascript" src="{{asset('/js/home.js')}}"></script>
    @endpush

</x-layout>
