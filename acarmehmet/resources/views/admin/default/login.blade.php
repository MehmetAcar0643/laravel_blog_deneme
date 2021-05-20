<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mehmet ACAR - Login</title>

    <!-- Custom fonts for this template-->
    <link href="/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/admin/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>


    <style type="text/css">
        .login-page {
            background: url("https://images.unsplash.com/photo-1593642634315-48f5414c3ad9?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80") no-repeat center center fixed;
            background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
        }

        body {
            overflow: hidden;
        }
    </style>

</head>

<body class="bg-gradient-primary login-page">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center ">

        <div class="col-xl-5 col-lg-8 col-md-7">

            <div style="background-color: rgba(255, 255, 255, 0.7);" class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->

                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"><b>Giriş Yap</b></h1>
                        </div>
                        <form class="user" method="post" action="{{route('admin.authenticate')}}">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email"
                                       value="{{old('email')}}"
                                       placeholder="E-mail Adresi">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="password"
                                       placeholder="Şifre">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck"
                                           name="remember_me" {{old("remember_me") ? 'checked': ""}}> <label
                                        class="custom-control-label" for="customCheck">Beni Hatırla</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Giriş
                            </button>
                            {{--                            <hr>--}}
                            {{--                            <a href="index.html" class="btn btn-google btn-user btn-block">--}}
                            {{--                                <i class="fab fa-google fa-fw"></i> Login with Google--}}
                            {{--                            </a>--}}
                            {{--                            <a href="index.html" class="btn btn-facebook btn-user btn-block">--}}
                            {{--                                <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook--}}
                            {{--                            </a>--}}
                        </form>
                        {{--                        <hr>--}}
                        {{--                        <div class="text-center">--}}
                        {{--                            <a class="small" href="forgot-password.html">Şifreni mi Unuttun?</a>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="text-center">--}}
                        {{--                            <a class="small" href="register.html">Create an Account!</a>--}}
                        {{--                        </div>--}}
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="/admin/vendor/jquery/jquery.min.js"></script>
<script src="/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/admin/js/sb-admin-2.min.js"></script>


@if(session()->has('error'))
    <script>
        alertify.set('notifier', 'position', 'top-right');
        alertify.error('{{session('error')}}')</script>
@elseif(session()->has('success'))
    <script>
        alertify.set('notifier', 'position', 'top-right');
        alertify.success('{{session('success')}}')</script>
@endif

</body>

</html>
