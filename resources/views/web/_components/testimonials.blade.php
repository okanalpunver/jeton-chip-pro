@if (count($site->testimonials) > 0)
    <section class="section @if ($bg == 'dark') bg-color-dark @endif border-0 m-0 pb-5">
        <div class="container">
            <div class="row pt-4 mt-5">
                <div class="col text-center">
                    <h2 class="font-weight-semibold ls-0 mb-5 text-uppercase">{{ __('Testimonials') }}</h2>
                </div>
            </div>
            <div class="row pb-4 mb-5">
                <div class="col">
                    <div class="owl-carousel owl-theme mb-0" data-plugin-options="{'responsive': {'0': {'items': 1}, '476': {'items': 1}, '768': {'items': 2}, '992': {'items': 2}, '1200': {'items': 2}}, 'dots': true, 'nav': false, 'margin': 40}">

                        @foreach ($site->testimonials as $item)
                            <div>
                                <div class="row justify-content-center">
                                    <div class="col-6 col-lg-3">
                                        <img src="/frontend/img/avatar.png" class="img-fluid rounded-circle" width="160" alt="" />
                                    </div>
                                    <div class="col-lg-9">
                                        <i class="fas fa-quote-left text-color-primary mb-2"></i>
                                        <p>{{ $item->content }}</p>
                                        <strong class="font-weight-semibold text-4">{{ $item->name }}</strong>
                                        <input type="text" class="rating-invisible" value="{{ $item->point }}" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary'}">
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
