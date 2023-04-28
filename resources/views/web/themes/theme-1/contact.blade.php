@extends('web.themes.theme-1._master', [
    'title' => 'İletişim'
])

@section('content')
    <div class="container">
        <div class="row py-4">
            <div class="col-lg-6">

                <div class="overflow-hidden mb-1">
                    <h2 class="font-weight-normal text-7 mt-2 mb-0 appear-animation animated maskUp appear-animation-visible"
                        data-appear-animation="maskUp" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                        Bize Ulaşın
                    </h2>
                </div>
                <div class="overflow-hidden mb-4 pb-3">
                    <p class="mb-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp"
                        data-appear-animation-delay="400" style="animation-delay: 400ms;">Aklınıza takılan her soruyu, bize sormaktan çekinmeyin!</p>
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
                            <label class="required font-weight-bold text-dark text-2">Adınız</label>
                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100"
                                class="form-control" name="name" id="name" required="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="required font-weight-bold text-dark text-2">E-Posta Adresi</label>
                            <input type="email" value="" data-msg-required="Please enter your email address."
                                data-msg-email="Please enter a valid email address." maxlength="100" class="form-control"
                                name="email" id="email" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="required font-weight-bold text-dark text-2">Mesaj</label>
                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="8"
                                class="form-control" name="message" id="message" required=""></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <input type="submit" value="Gönder" class="btn btn-primary btn-modern"
                                data-loading-text="Loading...">
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-6">

                <div class="appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn"
                    data-appear-animation-delay="800" style="animation-delay: 800ms;">
                    <h4 class="mt-2 mb-1">İletişim Bilgileri</h4>
                    <ul class="list list-icons list-icons-style-2 mt-2">
                        @if ($site->address)
                            <li>
                                <i class="fas fa-map-marker-alt top-6"></i>
                                <strong class="text-dark">Address:</strong>
                                {{ $site->address }}
                            </li>
                        @endif

                        @if ($site->phone)
                            <li>
                                <i class="fas fa-phone top-6"></i> <strong class="text-dark">Telefon:</strong> {{ $site->phone }}
                            </li>
                        @endif

                        @if ($site->email)
                            <li>
                                <i class="fas fa-envelope top-6"></i> 
                                <strong class="text-dark">E-Posta:</strong> 
                                <a href="mailto:{{ $site->email }}">{{ $site->email }}</a>
                            </li>
                        @endif

                        @if ($site->whatsapp)
                            <li>
                                <i class="fab fa-whatsapp top-6"></i> 
                                <strong class="text-dark">WhatsApp:</strong> 
                                <a href="https://api.whatsapp.com/send?phone=90{{ $site->whatsapp }}">{{ $site->whatsapp }}</a>
                            </li>
                        @endif

                        @if ($site->skype)
                            <li>
                                <i class="fab fa-skype top-6"></i> 
                                <strong class="text-dark">Skype:</strong> 
                                <a href="skype:{{ $site->skype }}">{{ '@'.$site->skype }}</a>
                            </li>
                        @endif

                    </ul>
                </div>

                <div class="appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn"
                    data-appear-animation-delay="950" style="animation-delay: 950ms;">
                    <h4 class="pt-5">Çalışma Saatleri</strong></h4>
                    <ul class="list list-icons list-dark mt-2">
                        <li><i class="far fa-clock top-6"></i> Pazartesi - Cuma - 09:00'dan 23:00</li>
                        <li><i class="far fa-clock top-6"></i> Cumartesi - 09:00'dan 02:00</li>
                        <li><i class="far fa-clock top-6"></i> Pazar - 09:00'dan 02:00</li>
                    </ul>
                </div>

                {{-- <h4 class="pt-5">Get in <strong>Touch</strong></h4>
                <p class="lead mb-0 text-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at
                    velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Lorem ipsum dolor sit
                    amet, consectetur adipiscing elit.</p> --}}

            </div>

        </div>

    </div>
@endsection