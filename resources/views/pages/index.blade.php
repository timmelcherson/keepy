@extends('layouts.app')

@section('content')
    <div class="container fill d-flex justify-content-center my-auto login-bg mx-0 p-0">
       
        <div class="jumbotron text-center align-self-center p-1 opaque-bg">
            <h1 class="title pt-4">Keepy keysystems</h1>
            
            <div class="container d-flex flex-column align-content-center px-5">

                    <form method="POST" class="p-3" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row m-2">
                            <label for="email" class="col col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="textrow-style form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row m-2 pb-2">
                            <label for="password" class="col col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="textrow-style form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row justify-content-end m-2 pb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group row d-flex justify-content-center p-2">
                            <button type="submit" class="btn rgu-bg-color btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="form-group justify-content-end row m-0">
                            <a class="btn btn-link p-0 mr-2" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>


                        {{-- REMOVE THIS BUTTON --}}
                        {{-- <div class="form-group row d-flex justify-content-center p-2">
                            <a href="/register" class="btn btn-success btn-lg" role="button">Register</a>
                        </div> --}}

                    </form>
            
            </div>
        </div>
    </div>
@endsection
