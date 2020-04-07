<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Free Gym - @yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('css/fontawesome-free/css/all.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sb-admin/sb-admin-2.min.css') }}">
</head>
<body id="page-top">

    <div id="wrapper">

        @include('sidebar')

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                @include('topbar')

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/client-form-masks.js') }}"></script>
</body>
</html>
