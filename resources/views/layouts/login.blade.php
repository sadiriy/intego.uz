<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Админ панель | Вход</title>

    <!-- Stylesheets -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/Noah/import.css') }}">

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"
            integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg=="
            crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{ asset('js/sidebar.js') }}"></script>


</head>

<body>
        <!-- Page content-->
<div class="container-fluid content-body">

    <!-- CONTENT -->

    @yield('content')

</div>

<!-- END Content -->

<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="#">E-95 | Marketing Department</a>
    </div>
</footer>
<!-- End Footer -->

<!-- Scripts -->

@yield('scripts')

</body>
</html>
