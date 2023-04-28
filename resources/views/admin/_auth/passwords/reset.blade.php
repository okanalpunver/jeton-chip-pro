@extends('admin._layouts.auth')

@section('title', __('Reset Password'))
    
@section('content')

    <form method="POST" action="{{ route('admin.password.update') }}" class="kt-form" novalidate="novalidate">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
            <div></div>
            <button type="submit" class="btn btn-primary btn-elevate kt-login__btn-primary">{{ __('Reset Password') }}!</button>
        </div>
        <!--end::Action-->
    </form>
@endsection
