<x-layout>

    <div id="thankYouPage" class="container">
        <div class="row py-3">
            <div class="col">
                <div class="row">
                    <div class="col text-center">
                        <img id="thank-you-image" class="img-fluid" src="{{asset('/images/thank-you.svg')}}"
                             alt="Thank You"/>
                    </div>
                </div>
                <p>
                    We are glad you have chosen us. One of our travel expert will get back to you shortly.
                    Book your flights with low deposit options, call us at 0203 475 5725
                </p>
            </div>
        </div>
    </div>

    @push('customScripts')
        <script>
            gtag('event', 'conversion', {'send_to': 'AW-328693758/OeLpCKSl7t0CEP7v3ZwB'});
        </script>

        <script>
            setTimeout(() => {
                window.location.href = HOST;
            }, 1000);
        </script>
    @endpush


    <x-home.widgets.why-book-with-us></x-home.widgets.why-book-with-us>
</x-layout>
