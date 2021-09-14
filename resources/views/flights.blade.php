<x-layout>

    @push('metaTags')
        <meta name="title" content="Book Flights At Best Prices Around The World With BestFlightDeals UK">
        <meta name="description" content="Finding the best flight deals across the world with price match guaranteed, low deposit & easy monthly installments">
        <meta name="keywords" content="v">
        <meta name="robots" content="index, follow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="English">
        <meta name="revisit-after" content="30 days">
        <meta name="author" content="BestFlightDeals ">
        <title>Book Flights At Best Prices Around The World With BestFlightDeals UK</title>
    @endpush
    @push('styles')
        <link rel="stylesheet" href="{{asset('css/flights.css')}}">
    @endpush

    <x-hero-banner></x-hero-banner>
    <x-home.widgets.flights></x-home.widgets.flights>
    <x-home.widgets.why-book-with-us></x-home.widgets.why-book-with-us>

    @push('customScripts')
        <script type="text/javascript" src="{{asset('/js/flights.js')}}"></script>
    @endpush

</x-layout>
