<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mimóvel') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('login-form/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('login-form/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('login-form/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('login-form/css/style.css') }}">
</head>

<body>


    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('{{ asset('login-form/images/bg_1.jpg') }}');">
        </div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3><a href="{{ url('/') }}" class="home_link"><strong>{{ config('app.name', 'Mimóvel') }}</strong></a> Login</h3>
                        <p class="mb-4">
                        </p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group first">
                                <label for="username">Email</label>
                                <input type="text" class="form-control" placeholder="Digite seu email" id="email"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            @error('email')
                                <span class="invalid" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group last mb-3">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control" placeholder="Digite sua senha" id="password" required autocomplete="current-password"
                                    name="password" autofocus>
                            </div>
                            @error('password')
                                <span class="invalid" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption"> {{ __('Remember Me') }}</span>
                                    <input type="checkbox" {{ old('remember') ? 'checked' : '' }}/>
                                    <div class="control__indicator"></div>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">
                                {{ __('Login') }}
                            </button>

                        </form>
                        <p class="col-md-7 pt-4">
                            <a href="{{ route('register') }}"  >
                                {{ __('Register') }}
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>


    </div>
    <script src="{{ asset('login-form/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('login-form/js/popper.min.js') }}"></script>
    <script src="{{ asset('login-form/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login-form/js/main.js') }}"></script>
</body>

</html>
