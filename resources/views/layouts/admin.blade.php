<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Админ панель | @yield('title')</title>

    <!-- Stylesheets -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/Noah/import.css') }}">--}}

    <link rel="stylesheet" type="text/css" href="{{ asset('css/sidebar.css') }}">

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <style>
        #active-{{ request()->segment(1) }} {
            background-color: blueviolet;
            color: white;
        }
    </style>

    @yield('style-link')


    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
            integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" src="{{ asset('js/sidebar.js') }}"></script>


</head>

<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading">
            <object id="img-logo" height="60px" width="auto" data=""></object>
            <br>

        </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" target="_blank" href="/"><i class="fas fa-home fa-fw"></i>
                <p>Пейрейти на сайт</p></a>
                <a id="active-forms" class="list-group-item list-group-item-action list-group-item-light p-3"
                   href="{{ route('pages.index') }}"><i class="fa-solid fa-code-fork fa-fw"></i>
                    <p>Страницы</p></a>
                <a id="active-branches" class="list-group-item list-group-item-action list-group-item-light p-3"
                   href=" {{ route('categories.index') }} "><i class="fa-solid fa-folder fa-fw"></i>
                    <p>Категории</p></a>
                <a id="active-branches" class="list-group-item list-group-item-action list-group-item-light p-3"
                   href=" {{ route('products.index') }} "><i class="fa-solid fa-cube fa-fw"></i>
                    <p>Товары</p></a>
                <a id="active-branches" class="list-group-item list-group-item-action list-group-item-light p-3"
                   href=" {{ route('attributes.index') }} "><i class="fa-solid fa-ruler-horizontal fa-fw"></i>
                    <p>Атрибуты</p></a>
{{--                <a id="active-branches" class="list-group-item list-group-item-action list-group-item-light p-3"--}}
{{--                   href=" {{ route('partners.index') }} "><i class="fa-solid fa-handshake"></i>--}}
{{--                    <p>Партнеры</p></a>--}}
{{--                <a id="active-branches" class="list-group-item list-group-item-action list-group-item-light p-3"--}}
{{--                   href=" {{ route('certificates.admin') }} "><i class="fa-solid fa-certificate"></i>--}}
{{--                    <p>Сертификаты</p></a>--}}
{{--                <a id="active-branches" class="list-group-item list-group-item-action list-group-item-light p-3"--}}
{{--                   href=" {{ route('overviews.admin') }} "><i class="fa-solid fa-star"></i>--}}
{{--                    <p>Отзывы</p></a>--}}
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
               href="{{ route('orders.index') }}"><i class="fa-solid fa-bell fa-fw"></i>
                <p>Заказы</p></a>
{{--                <a class="list-group-item list-group-item-action list-group-item-light p-3"--}}
{{--               href="{{ route('priceListRequests.index') }}"><i class="fa-solid fa-money-check-dollar fa-fw"></i>--}}
{{--                <p>Прайс-лист</p></a>--}}
{{--                <a class="list-group-item list-group-item-action list-group-item-light p-3"--}}
{{--               href="{{ route('calculations.index') }}"><i class="fa-solid fa-calculator fa-fw"></i>--}}
{{--                <p>Расчет</p></a>--}}
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
               href="{{ route('settings.index') }}"><i class="fa-solid fa-gears fa-fw"></i>
                <p>Настройки</p></a>
        </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="btn btn-primary" id="sidebarToggle"><i class="fas fa-bars"></i></button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="fas fa-user"></i> {{ Auth::user()->name }}</a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="fas fa-sign-out-alt"></i> Выйти</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container-fluid content-body">

            <!-- CONTENT -->

            @yield('content')

        </div>
    </div>
</div>

<!-- END Content -->

<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2023 Copyright:
        <a class="text-reset fw-bold" target="_blank" href="https://www.linkedin.com/in/sadiriy/">Sardor Sadiriy</a>
    </div>
</footer>
<!-- End Footer -->

<!-- Scripts -->

@yield('scripts')

</body>
</html>
