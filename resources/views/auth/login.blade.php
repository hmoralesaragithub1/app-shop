@extends('layouts.app')

@section('main-body-class')
    login-page
@endsection

@section('content')
{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
--}}

<div class="page-header header-filter" style="background-image: url('{{asset('img/bg7.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <div class="card card-login" style="height: 350px">
                    <form class="form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">Inicia Sesión</h4>
                            {{--
                            <div class="social-line">
                                <a href="#pablo" class="btn btn-just-icon btn-link">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-link">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-link">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                            --}}
                        </div>
                        <p class="description text-center">Ingresa tus credenciales</p>
                        <div class="card-body mt-3">
                            {{-- <div class="input-group">
                                <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="First Name...">
                            </div> --}}

                            <div class="input-group">
                                <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">fingerprint</i>
                    </span>
                                </div>
                                <input placeholder="Username..." id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                                </div>
                                <input placeholder="Contraseña..." id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            </div>

                            <div class="input-group checkbox">

                                    <label>

                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        Recordar Sesión
                                    </label>

                            </div>

                        </div>

                        <div class="footer text-center">
                            {{-- <a href="#pablo" class="btn btn-primary btn-link btn-wd btn-lg">Ingresar</a> --}}
                            <button type="submit" class="btn btn-primary">
                                {{ __('Ingresar') }}
                            </button>
                            {{--
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Olvidaste tu contraseña?') }}
                            </a>
                            --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
</div>

@endsection
