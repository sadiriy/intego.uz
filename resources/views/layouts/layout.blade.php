<!doctype html>
<html lang="RU-ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('seo')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

    <title>Intego | @yield('title')</title>

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
        <div class="top-bar-info row">
            <div class="col-md-2 col-sm-3 col-xs-3 burger-menu"></div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <a class="navbar-brand" href="/"><img id='logo-img' src="{{ asset($settings->logo) }}" alt="intego"></a>
            </div>
{{--            @if(count(config('app.languages')) > 1)--}}
{{--                <li class="nav-item dropdown d-md-down-none">--}}
{{--                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                        <img class="lang-img"--}}
{{--                             src="{{ asset('img/lang/'.strtoupper(app()->getLocale()).'.jpg') }}" alt="">--}}
{{--                        &nbsp;{{ ucfirst(app()->getLocale()) }}&nbsp;--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu dropdown-menu-right">--}}
{{--                        @foreach(config('app.languages') as $langLocale => $langName)--}}
{{--                            <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}"><img class="lang-switcher-img"--}}
{{--                                    src="{{ asset('img/lang/'.strtoupper($langLocale).'.jpg') }}" alt=""> ({{ $langName }})</a>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            @endif--}}
            <div class="contact-container col-md-7 col-sm-6 col-xs-12">
                <ul class="contact-info">
                    <li class="contact-link">
                        <span class="contact-header-span">Отдел оптовых продаж</span>
                        <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
                    </li>
                    <li class="contact-link">
                        <span class="contact-header-span">Сервис и поддержка</span>
                        <a href="tel:{{ $settings->email }}">{{ $settings->email }}</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-3" id="cart-container">
                    <span class="header-cart-count">{{ Cart::instance('default')->count() }}</span>
                    <a class="nav-link" href="{{ route('cart.index') }}"><i class="fa-solid fa-cart-shopping" style="color: #000"></i></a>
            </div>

        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse menu-items" id="navbarNavAltMarkup">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        {{ __('Продукция') }}
                    </a>
                    <div class="dropdown-menu">
                        @foreach($categories as $category)
                            <a class="dropdown-item" href="{{ route('front.category.index', $category) }}">
                                <img src="/{{ $category->image }}" alt="{{ $category->name_ru }}">
                                <span>{{ $category->name_ru }}</span>
                            </a>
                        @endforeach
                    </div>
                </li>
                @foreach($pages as $page)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.page', $page->url) }}">{{ $page->title_ru }}</a>
                    </li>
                @endforeach
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
{{--                <div class="footer-logo">--}}
{{--                    <img src="{{ asset($settings->logo_white ?? "") }}" alt="logo">--}}
{{--                </div>--}}
                <div class="footer-copyrights">
                    <span>2023 INTEGO</span>
                </div>

            </div>
{{--            <div class="social-links">--}}
{{--                <div class="footer-contacts">--}}
{{--                    <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>--}}
{{--                    <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>--}}
{{--                </div>--}}
{{--                <div class="footer-social">--}}

{{--                    <a target="_blank" href="{{ $settings->fb_link }}"><i class="fa-brands fa-facebook-square"></i></a>--}}
{{--                    <a target="_blank" href="{{ $settings->tg_link }}"><i class="fa-brands fa-telegram"></i></a>--}}

{{--                </div>--}}
{{--            </div>--}}
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

</body>
</html>
