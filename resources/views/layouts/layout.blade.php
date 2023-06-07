<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('seo')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

    <title>UNIONCAST | @yield('title')</title>

    <!-- Scripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"
            integrity="sha512-pax4MlgXjHEPfCwcJLQhigY7+N8rt6bVvWLFyUMuxShv170X53TRzGPmPkZmGBhk+jikR8WBM4yl7A9WMHHqvg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/app2.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" href="{{ asset('img/icon.png') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app2.css') }}" rel="stylesheet">

    <link href="{{ asset('css/fonts/Greenwich/stylesheet.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"
          integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
          integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="{{ asset('slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    @yield('style-link')

</head>
<body>
<div class="top-bar">
    <div class="container">
        <div class="top-bar-info">
            @if(count(config('app.languages')) > 1)
                <li class="nav-item dropdown d-md-down-none">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img class="lang-img"
                             src="{{ asset('img/lang/'.strtoupper(app()->getLocale()).'.jpg') }}" alt="">
                        &nbsp;{{ ucfirst(app()->getLocale()) }}&nbsp;
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach(config('app.languages') as $langLocale => $langName)
                            <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}"><img class="lang-switcher-img"
                                    src="{{ asset('img/lang/'.strtoupper($langLocale).'.jpg') }}" alt=""> ({{ $langName }})</a>
                        @endforeach
                    </div>
                </li>
            @endif
            <ul class="contact-info">
                <li class="contact-link">
                    <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
                </li>
                <li class="contact-link">
                    <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                </li>
            </ul>
        </div>
        <div class="lme-rate">
            <a target="_blank" href="{{ $settings->li_link }}"><i class="fa-brands fa-linkedin"></i></a>
            <a target="_blank" href="{{ $settings->fb_link }}"><i class="fa-brands fa-facebook"></i></a>
            <a target="_blank" href="{{ $settings->tg_link }}"><i class="fa-brands fa-telegram"></i></a>
            <a target="_blank" href="{{ $settings->wa_link }}"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
        @yield('lme-course')
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="/"><img id='logo-img' src="{{ asset($settings->logo) }}" alt="unioncast"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse menu-items" id="navbarNavAltMarkup">
            <ul class="navbar-nav mb-2 mb-lg-0">
                @foreach($pages as $page)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route($page->name) }}">{{ $page->{'title_'.app()->getLocale()} }}</a>
                    </li>
                @endforeach

                <li class="nav-item">
                    <a class="nav-link" href="/certificates">{{ __('Сертификаты') }}</a>
                </li>
                <li class="nav-item" style="margin-left: 30px">
                    <span class="header-cart-count">{{ Cart::instance('default')->count() }}</span>
                    <a class="nav-link" href="{{ route('cart.index') }}"><i class="fa-solid fa-cart-shopping" style="color: #000"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    @if(session()->has('error_message'))
        <div class="animate__animated animate__fadeInDown alert alert-danger">
            {{ session()->get('error_message') }}
        </div>
        <br>
    @endif
    @if(session()->has('success_message'))
        <div class="animate__animated animate__fadeInDown alert alert-success">
            {{ session()->get('success_message') }}
        </div>
        <br>
    @endif

    @yield('content')


<footer>
    <div class="footer-contain">
        <div class="column-container">
            <div class="footer-col">
                <div class="footer-logo">
                    <img src="{{ asset($settings->logo_white) }}" alt="logo">
                </div>
                <div class="footer-copyrights">
                    <ul class="unioncast">
                        <li>2022 UNIONCAST</li>
                        <li><a href="#">{{__('Политика конфиденциальности') }}</a></li>
                    </ul>
                    <div style="display: none;" class="footer-watermark">
                        <img src="{{ asset('img/e95_logo.png') }}" alt="E-95 Marketing Agency">
                        <div class="watermark-text">
                            <p>
                                {{__('Сайт от маркетинговго агенства')}} <a target="_blank" href="https://e-95.uz/">E-95</a><br>
                                <a target="_blank" href="https://e-95.uz/portfolio/unioncast/">{{__('Информация о сайте') }}</a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="social-links">
                <div class="footer-contacts">
                    <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
                    <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                </div>
                <div class="footer-social">

                    <a target="_blank" href="{{ $settings->li_link }}"><i class="fa-brands fa-linkedin"></i></a>
                    <a target="_blank" href="{{ $settings->fb_link }}"><i class="fa-brands fa-facebook-square"></i></a>
                    <a target="_blank" href="{{ $settings->tg_link }}"><i class="fa-brands fa-telegram"></i></a>
                    <a target="_blank" href="{{ $settings->wa_link }}"><i class="fa-brands fa-whatsapp"></i></a>

                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script>
    const element = document.querySelector('.alert');
    element.style.setProperty('--animate-duration', '0.5s');

    element.addEventListener('animationend', () => {
        element.classList.remove('animate__fadeInUp');
        setTimeout(function () {
            element.classList.add('animate__fadeOutUp');
            setTimeout(function () {
                element.style.setProperty('display', 'none');
            }, 500);
        }, 4000);
    });
</script>


@yield('slick')

{{--bitrix chat--}}
<script>
    (function(w,d,u){
        var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
        var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
    })(window,document,'https://quvvat.unioncast.uz/upload/crm/site_button/loader_2_g5ttre.js');
</script>

</body>
</html>
