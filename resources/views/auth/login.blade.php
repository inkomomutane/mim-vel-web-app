@extends('backend.layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 p-sm-3 p-lg-6 row">
                                    <img src="{{asset('backend/img/auth.svg')}}" class="col-sm-12" alt="login">
                                </div>
                                <div class="col-sm-6 col-md-6 py-sm-3 py-lg-4 row">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row my-3">
                                            <label for="email"
                                                   class=" col-form-label">{{ __('E-Mail Address') }}</label>
                                        </div>
                                        <div class="col-12">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                                   autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <label for="password" class=" col-form-label ">{{ __('Password') }}</label>
                                            <div class="col-md-12">
                                                <input id="password" type="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       name="password" required autocomplete="current-password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <button type="submit"
                                                    class="btn btn-purple col-sm-11 mx-auto rounded-3">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
