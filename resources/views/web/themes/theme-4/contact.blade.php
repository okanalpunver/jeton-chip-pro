@extends('web.themes.theme-4._master', [
    'title' => __('Contact')
])

@section('content')
<section class="section section-dark section-no-border custom-padding-top-1 mb-0">
    <div class="container">
        <div class="row py-4">
            <div class="col-lg-6">

                <div class="overflow-hidden mb-1">
                    <h1 class="font-weight-bold text-color-primary mb-0">{{ __('Contact Us') }}</h1>
                </div>
                <div class="overflow-hidden mb-4 pb-3">
                    <p class="mb-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp"
                        data-appear-animation-delay="400" style="animation-delay: 400ms;">{{ __('Need to get in touch with the team? We\'re all ears.') }}</p>
                </div>

                <form id="contactForm" class="contact-form" action="php/contact-form.php" method="POST"
                    novalidate="novalidate">
                    <div class="contact-form-success alert alert-success d-none mt-4" id="contactSuccess">
                        <strong>Success!</strong> Your message has been sent to us.
                    </div>

                    <div class="contact-form-error alert alert-danger d-none mt-4" id="contactError">
                        <strong>Error!</strong> There was an error sending your message.
                        <span class="mail-error-message text-1 d-block" id="mailErrorMessage"></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label class="required font-weight-bold  text-2">{{ __('Name') }}</label>
                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100"
                                class="form-control" name="name" id="name" required="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="required font-weight-bold  text-2">{{ __('E-Mail Address') }}</label>
                            <input type="email" value="" data-msg-required="Please enter your email address."
                                data-msg-email="Please enter a valid email address." maxlength="100" class="form-control"
                                name="email" id="email" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="required font-weight-bold  text-2">{{ __('Your Message') }}</label>
                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="8"
                                class="form-control" name="message" id="message" required=""></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <input type="button" value="{{ __('Submit') }}" class="btn btn-primary btn-modern"
                                data-loading-text="Loading...">
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-6">

                <div class="appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn"
                    data-appear-animation-delay="800" style="animation-delay: 800ms;">
                    <h4 class="font-weight-bold mb-0">{{ __('Contact Details') }}</h4>
                    <ul class="list list-icons list-icons-style-2 mt-2">
                        @if ($site->address)
                            <li>
                                <i class="fas fa-map-marker-alt top-6"></i>
                                <strong>{{ __('Address') }}:</strong>
                                {{ $site->address }}
                            </li>
                        @endif

                        @if ($site->phone)
                            <li>
                                <i class="fas fa-phone top-6"></i> <strong>{{ __('Phone') }}:</strong> {{ $site->phone }}
                            </li>
                        @endif

                        @if ($site->email)
                            <li>
                                <i class="fas fa-envelope top-6"></i>
                                <strong>{{ __('E-Mail Address') }}:</strong>
                                <a href="mailto:{{ $site->email }}">{{ $site->email }}</a>
                            </li>
                        @endif

                        @if ($site->whatsapp)
                            <li>
                                <i class="fab fa-whatsapp top-6"></i>
                                <strong>WhatsApp:</strong>
                                <a href="https://api.whatsapp.com/send?phone=90{{ $site->whatsapp }}">{{ $site->whatsapp }}</a>
                            </li>
                        @endif

                        @if ($site->skype)
                            <li>
                                <i class="fab fa-skype top-6"></i>
                                <strong>Skype:</strong>
                                <a href="skype:{{ $site->skype }}">{{ '@'.$site->skype }}</a>
                            </li>
                        @endif

                    </ul>
                </div>

                <hr>

                <div class="appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn"
                    data-appear-animation-delay="950" style="animation-delay: 950ms;">
                    <h4 class="font-weight-bold  mb-0">{{ __('Working Hours') }}</h4>
                    <ul class="list list-icons list-dark mt-2">
                        <li><i class="far fa-clock top-6"></i> {{ __('Monday/Friday: 10am - 2am') }}</li>
                        <li><i class="far fa-clock top-6"></i> {{ __('Saturday/Sunday: 10am - 4am') }}</li>
                    </ul>
                </div>

                {{-- <h4 class="pt-5">Get in <strong>Touch</strong></h4>
                <p class="lead mb-0 text-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at
                    velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Lorem ipsum dolor sit
                    amet, consectetur adipiscing elit.</p> --}}

            </div>

        </div>

    </div>
</section>
@endsection
