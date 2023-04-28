@if ($site->whatsapp)
<section class="call-to-action call-to-action-default with-button-arrow content-align-center " style="background-color: #cddc39">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-9">
                <div class="call-to-action-content">
                    <h2 class="font-weight-normal text-6 mb-0">{!! __('Whatsapp Order Line') !!}</h2>
                    <h2 class="font-weight-normal text-5 mb-0"><strong class="font-weight-extra-bold">{{ __('No registration required.') }}</strong></h2>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="call-to-action-btn">
                <a href="https://api.whatsapp.com/send?phone=90{{ $site->whatsapp }}" target="_blank" class="btn btn-dark btn-lg text-3 font-weight-semibold px-4 py-3">
                        <i class="fab fa-whatsapp"></i> {{ ($site->lang == 'tr') ? $site->whatsapp : '90'.$site->whatsapp }}
                    </a>
                        <span class="arrow hlb d-none d-md-block appear-animation animated rotateInUpLeft appear-animation-visible" data-appear-animation="rotateInUpLeft" style="top: -40px; left: 70%; animation-delay: 100ms;"></span>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
