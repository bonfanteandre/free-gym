<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Free Gym - Entrar</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('css/fontawesome-free/css/all.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sb-admin/sb-admin-2.min.css') }}">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900">Free Gym</h1>
                                        <small class="text-gray-900 mb-4">Insira suas credenciais para acessar.</small>
                                    </div>
                                    @include('errors')
                                    <form method="POST" action"/login" class="user">
                                        
                                        @csrf

                                        <div class="form-group">
                                            <label for="email" class="control-label">
                                                <strong>E-mail *</strong>
                                            </label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="fulano@email.com" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="control-label">
                                                <strong>Senha *</strong>
                                            </label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="*********" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-block">
                                            <i class="fa fa-sign-in-alt"></i>
                                            Entrar
                                        </button>
                                    </form>
                                    <!-- <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin/sb-admin-2.min.js') }}"></script>

</body>

</html>