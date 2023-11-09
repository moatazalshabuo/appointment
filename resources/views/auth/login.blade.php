@extends('layouts.app')

@section('style')
    <style>
          
        input {
            outline: 0;
            border-width: 0 0 2px !important;
            border-color: #1b68ff !important
            }
            input:focus {
            border-color: green !important;
            outline: 1px dotted #000 !important;
            box-shadow: 0px !important;
            }
    </style>
@endsection
@section('content')
<img src="{{ asset('assets/3870277.jpg') }}" width="100%" height="350px">
<div class="container">
    <div class="row align-items-center h-100">
        <div class="col-md-4"></div>
        <div class="col-md-3 m-2">
            <div class="text-center">
               
                <h1 class="h6">تسجيل الدخول</h1>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class=" col-form-label text-md-end">البريد الالكتروني</label>

                    <div class="">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" placeholder="البريد الالكتروني" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class=" col-form-label text-md-end">كلمة المرور</label>
                    <div class="">
                        <input id="password" placeholder="كلمة مرور" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- <div class="form-group">
                    <div class="">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> --}}
                <div class="row mb-0">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary w-50 m-auto">
                           تسجيل الدخول
                        </button>

                        
                    </div>
                    <div class="col-12 text-center">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        <div>you don't have an account <a href="{{ route('register') }}">Register here</a></div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
