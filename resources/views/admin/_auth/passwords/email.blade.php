@extends('admin._layouts.auth')

@section('title', __('Reset Password'))

@section('content')
    <form method="POST" action="{{ route('admin.password.email') }}" class="kt-form" novalidate="novalidate">
        @csrf

        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!--begin::Action-->
        <div class="kt-login__actions">
            <div></div>
            <button type="submit" class="btn btn-primary btn-elevate kt-login__btn-primary">{{ __('Send Password Reset Link') }}!</button>
        </div>
        <!--end::Action-->
    </form>

@endsection
