@extends('layouts.master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                @if($errors->has('error'))
                <div class="error mx-auto">{{ $errors->first('error') }}</div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ request()->is('login') ? route('login.custom') : route('admin.login.custom') }}" id="loginform">
                        @csrf
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <br><br>

                                @if (request()->is('login'))
                               <p>Not a member? <a href="#!">Register</a></p>
                               <p>or sign up with:</p>
                                {{-- <a href="{{route('redirect.google')}}"><i class="fa fa-google" style="font-size:24px"></i></a> --}}
                                {{-- <i class="fa fa-facebook" style="font-size:24px"></i> --}}
                                @endif


                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                        
                         @if (request()->is('login'))
                        <!-- Register buttons -->
                        <div class="text-center">
                            
                            <a type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a type="button" href="{{route('redirect.google')}}" class="btn btn-link btn-floating mx-1">
                                <i class="fa fa-google"></i>
                            </a>

                            <a type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fa fa-twitter"></i>
                            </a>

                            <a type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fa fa-github"></i>
                            </a>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $("#loginform").validate({
            rules: {
                email: {
                    required: true
                }
                , password: {
                    required: true
                }
            , }
        });
    });

</script>
@endsection
