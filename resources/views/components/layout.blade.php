<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    @stack('metaTags')

    <title>{{env('APP_NAME')}}{{ empty($title) ? '' : ' - '.$title}}</title>

    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}"/>

@stack('styles')

<!-- Global site tag (gtag.js) - Google Ads: 328693758 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-328693758"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'AW-328693758');
    </script>

</head>
<body class="antialiased">

<x-top-nav></x-top-nav>

{{ $slot }}

<x-footer></x-footer>

@stack('scripts')
<!-- BEGIN responseiQ.com widget -->
<script type="text/javascript"
        src="https://app.responseiq.com/widgetsrc.php?widget=6K5T14YT7L26NAX275&widgetrnd=Math.random();"></script>
<!-- END responseiQ.com widget -->

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/61002bdf649e0a0a5cce3122/1fbkamof7';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@stack('customScripts')
</body>
</html>
