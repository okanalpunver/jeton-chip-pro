@extends('admin._layouts.auth')

@section('title', __('Sign Up'))

@section('content')

    <form method="POST" action="{{ route('admin.register') }}" class="kt-form" novalidate="novalidate">
        @csrf

        <div class="form-group">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
        </div>

        <!--begin::Action-->
        <div class="kt-login__actions">
            <div><a href="#" class="kt-link kt-login__link-forgot">{{ __('Terms of Service') }}</a> ve <a href="#" class="kt-link kt-login__link-forgot">{{ __('Privacy Policy') }}</a></div>
            <button type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">{{ __('Sign Up') }}!</button>
        </div>
        <!--end::Action-->

        
    </form>

@endsection
