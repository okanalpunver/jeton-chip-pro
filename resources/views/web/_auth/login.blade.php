@extends('web.themes.'.app('site')->theme.'._master', [
    'title' =>  __('Login')
])

@section('content')
<section class="section section-no-border section-dark custom-padding-top-1 pb-0 mb-0 vh100">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-7 col-lg-9">
                <h1 class="font-weight-bold text-color-primary mb-5">{{ __('Login') }}</h1>



                <form method="POST" class="mb-5" action="{{ route('web.login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('web.password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>


                @if(\Illuminate\Support\Facades\Session::has('error'))

                    <span class="alert alert-danger"> {{\Illuminate\Support\Facades\Session::get('error')}}</span>

                @endif

            </div> 
            <div class="col-md-5 col-lg-3">
                <img src="/frontend/img/zynga-lady.png" alt="">
            </div>
        </div>   
    </div>
</section>
@endsection
