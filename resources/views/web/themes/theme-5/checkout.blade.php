@extends('web.themes.theme-5._master', [
    'title' => 'Ödeme'
])

@section('content')
    <section class="section section-no-border section-quaternary custom-padding-top-1 my-0 pb-0">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-12">
                    
                    <iframe src="https://www.paytr.com/odeme/{{($paymentType == 'eft') ? 'api' : 'guvenli' }}/{{ $token }}" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;"></iframe>
                </div>
            </div>
        </div>
    </section>

    @component('web._components.testimonials', [
        'bg' => 'dark'
    ])
        
    @endcomponent

@endsection

@push('scripts')
    <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
    <script>iFrameResize({},'#paytriframe');</script>
@endpush