@extends('admin._layouts.auth')

@section('title', __('Sign In'))

@section('content')
    <!--begin::Form-->
    <form method="POST" action="{{ route('admin.login') }}" class="kt-form" novalidate="novalidate">
        @csrf
        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mt-4">
            <div class="kt-checkbox-inline">
                <label class="kt-checkbox">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                    <span></span>
                </label>
            </div>
        </div>

        <!--begin::Action-->
        <div class="kt-login__actions">
            @if (Route::has('admin.password.request'))
            <a href="{{ route('admin.password.request') }}" class="kt-link kt-login__link-forgot">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
            <button type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">{{ __('Sign In') }}!</button>
        </div>
        <!--end::Action-->
    </form>
    <!--end::Form-->
@endsection