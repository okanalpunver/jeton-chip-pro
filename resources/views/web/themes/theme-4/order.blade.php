@extends('web.themes.theme-4._master', [
    'title' => 'Sipariş'
])

@section('content')
    <section class="section section-dark section-no-border custom-padding-top-1 mb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if(session('cart'))

                        <table class="table table-dark shop_table cart mt-3">
                            <thead>
                                <tr>
                                    <th class="product-name">
                                        {{ __('Product Name') }}
                                    </th>

                                    <th class="product-quantity">
                                        {{ __('Quantity') }}
                                    </th>
                                    <th class="product-subtotal">
                                        {{ __('Amount') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $amount = 0;
                                @endphp
                                @foreach(session('cart') as $id => $item)
                                    @php
                                        $amount += ($item['price'] * $item['qty']);
                                    @endphp
                                    <tr class="cart_table_item">
                                        <td class="product-name">
                                            <a href="shop-product-sidebar-left.html">{{ $item['name'] }}</a>
                                        </td>
                                        <td class="product-quantity">
                                            @short_format($item['qty'])
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">@money(round($amount, 2) * 100, $site->currency)</span>
                                        </td>
                                    </tr>

                                @endforeach

                                {{-- <tr>
                                    <td class="actions" colspan="6">
                                        <div class="actions-continue">
                                            <input type="submit" value="Update Cart" name="update_cart"
                                                class="btn btn-xl btn-light pr-4 pl-4 text-2 font-weight-semibold text-uppercase">
                                        </div>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>

                    @endif

                    {{ html()->form(route('web.order.store'))->open() }}
                        <div class="form-group row mt-4">
                            {{ html()->label(__('Name'))->class('col-lg-4 text-left text-lg-right font-weight-bold col-form-label form-control-label text-2 required') }}
                            <div class="col-lg-8">
                                {{ html()->text('name')->value(auth()->user()->name ?? '')->class('form-control form-control-lg') }}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ html()->label(__('Phone Number'))->class('col-lg-4 text-left text-lg-right font-weight-bold col-form-label form-control-label text-2 required') }}
                            <div class="col-lg-8">
                                {{ html()->text('phone')->value(auth()->user()->phone ?? '')->class('form-control form-control-lg') }}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ html()->label('Facebook '.__('E-Mail Address'))->class('col-lg-4 text-left text-lg-right font-weight-bold col-form-label form-control-label text-2 required') }}
                            <div class="col-lg-8">
                                {{ html()->email('email')->value(auth()->user()->email ?? '')->class('form-control form-control-lg') }}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ html()->label('Facebook '.__('Password'))->class('col-lg-4 text-left text-lg-right font-weight-bold col-form-label form-control-label text-2 required') }}
                            <div class="col-lg-8">
                                {{ html()->text('password')->class('form-control form-control-lg') }}
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            {{ html()->label('Ödeme Yöntemi')->class('col-lg-4 text-left text-lg-right font-weight-bold col-form-label form-control-label text-2 required') }}
                            <div class="col-lg-8">
                                <div class="custom-control custom-radio">
                                    <input id="eft" name="order_type" value="eft" type="radio" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="eft">Banka Havalesi/EFT</label>
                                </div>

                                <div class="custom-control custom-radio">
                                    <input id="credit" name="order_type" value="credit_card" type="radio" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="credit">Kredi Kartı</label>
                                </div>

                            </div>
                        </div> --}}



                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="submit" value="{{ __('Continue') }}"
                                    class="btn btn-xl btn-primary pr-4 pl-4 text-2 font-weight-semibold text-uppercase float-right mb-2"
                                    data-loading-text="Loading...">
                            </div>
                        </div>

                    {{ html()->form()->close() }}

                </div>

                <div class="d-none d-lg-block col-lg-4 align-self-xl-stretch order-1 order-lg-2 position-relative z-index-1">
                    <img src="/frontend/img/poker-chips.png" alt="" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200" class="img-fluid custom-product-image-style-1 appear-animation animated fadeInLeftShorter appear-animation-visible" style="animation-delay: 200ms;">
                </div>
            </div>
        </div>
    </section>

    @component('web._components.whatsapp')
    @endcomponent

    @component('web._components.testimonials', [
        'bg' => 'dark'
    ])

    @endcomponent

@endsection
