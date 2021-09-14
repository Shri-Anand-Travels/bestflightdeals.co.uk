<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    @stack('metaTags')

{{--    <title>{{env('APP_NAME')}}{{ empty($title) ? '' : ' - '.$title}}</title>--}}

    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}"/>

@stack('styles')

{{--    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-328693758"></script>--}}
{{--    <script>--}}
{{--        window.dataLayer = window.dataLayer || [];--}}

{{--        function gtag() {--}}
{{--            dataLayer.push(arguments);--}}
{{--        }--}}

{{--        gtag('js', new Date());--}}

{{--        gtag('config', 'AW-328693758');--}}
{{--    </script>--}}

</head>
<body class="antialiased">

<x-top-nav></x-top-nav>

{{ $slot }}

<x-footer></x-footer>

<div class="modal fade" id="callUsPopup" tabindex="-1" aria-labelledby="callUsPopupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered border-0">
        <div class="modal-content bg-transparent">
            <div class="modal-body p-0 ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute;top: 10px;right: 10px;">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
                <a href="tel:{{env('CONTACT_PHONE_ACTUAL')}}">
                    <img loading="lazy" class="img-fluid" src="{{asset('/images/popup.png')}}" alt="popup">
                </a>
            </div>
        </div>
    </div>
</div>

@stack('scripts')

<!-- BEGIN responseiQ.com widget -->
<script
    type="text/javascript"
    src="https://app.responseiq.com/widgetsrc.php?widget=Y1210QQ948XI3J57151&widgetrnd=Math.random();">
</script>
<!-- END responseiQ.com widget -->

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/613f5d4225797d7a89feb7ef/1fffo8jkn';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@stack('customScripts')
</body>
</html>
