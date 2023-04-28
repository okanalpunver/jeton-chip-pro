@extends('web.themes.theme-5._master', [
    'title' => __('Cart')
])

@section('content')
    <section class="section section-quaternary section-no-border custom-padding-top-1 my-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" style="background: #343a40; padding-top: 35px;">

                    <h1 class="font-weight-bold text-color-primary mb-0">{{ __('Cart') }}</h1>

                    @if(session('cart'))

                        <table class="table table-dark mt-3">
                            <thead>
                                <tr>
                                    <th class="product-name">
                                        {{ __('Product Name') }}
                                    </th>

                                    <th class="product-quantity text-center" width="1">
                                        {{ __('Quantity') }}
                                    </th>
                                    <th class="product-subtotal text-right" width="1">
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
                                            {{ $item['name'] }}
                                        </td>
                                        <td class="product-quantity text-center">
                                            @short_format($item['qty'])
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">@money(round($item['price'] * $item['qty'], 2) * 100, $site->currency)</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th class="text-nowrap text-right">{{ __('Total Amount') }}</th>
                                    <th>@money(round($amount, 2) * 100, $site->currency)</th>
                                </tr>
                            </tfoot>
                        </table>

                        {{ html()->form('POST', route('web.order.store'))->open() }}

                            <div class="form-group row">
                                {{ html()->label(__('Phone Number'))->class('col-lg-4 text-left text-lg-right font-weight-bold col-form-label form-control-label text-2 required') }}
                                <div class="col-lg-8">
                                    @guest
                                        {{ html()->text('phone')
                                            ->class($errors->has('phone') ? 'form-control form-control-lg is-invalid' : 'form-control form-control-lg') }}
                                    @else
                                        {{ html()->text('phone')
                                            ->value(old('phone') ?? auth()->user()->phone)
                                            ->class($errors->has('phone') ? 'form-control form-control-lg is-invalid' : 'form-control form-control-lg') }}
                                    @endguest

                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ html()->label('Facebook '.__('E-Mail Address'))->class('col-lg-4 text-left text-lg-right font-weight-bold col-form-label form-control-label text-2 required') }}
                                <div class="col-lg-8">
                                    @guest
                                        {{ html()->email('email')
                                            ->class($errors->has('email') ? 'form-control form-control-lg is-invalid' : 'form-control form-control-lg') }}
                                    @else
                                        {{ html()->email('email')
                                            ->value(old('email') ?? auth()->user()->email)
                                            ->class($errors->has('email') ? 'form-control form-control-lg is-invalid' : 'form-control form-control-lg') }}
                                    @endguest

                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ html()->label('Facebook '.__('Password'))->class('col-lg-4 text-left text-lg-right font-weight-bold col-form-label form-control-label text-2 required') }}
                                <div class="col-lg-8">
                                    {{ html()->text('password')
                                        ->attribute('required', 'required')
                                        ->class($errors->has('password') ? 'form-control form-control-lg is-invalid' : 'form-control form-control-lg') }}

                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ html()->label(__('Payment method'))->class('col-lg-4 text-left text-lg-right font-weight-bold col-form-label form-control-label text-2 required') }}
                                <div class="col-lg-8">
                                    <div class="custom-control custom-radio">
                                        <input id="eft" name="payment_type" value="eft" type="radio" class="custom-control-input">
                                        <label class="custom-control-label" for="eft">{{ __('Bank Transfer / EFT') }}</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input id="credit" name="payment_type" value="card" type="radio" class="custom-control-input">
                                        <label class="custom-control-label" for="credit">{{ __('Credit card') }}</label>
                                    </div>
                                    @error('payment_type')
                                        <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="submit" value="{{ __('Continue') }}"
                                        class="btn btn-xl btn-primary pr-4 pl-4 text-2 font-weight-semibold text-uppercase float-right mb-2"
                                        data-loading-text="Loading...">
                                </div>
                            </div>

                        {{ html()->form()->close() }}

                    @else
                            <p>{{ __('Your Shopping Cart is empty') }}</p>
                    @endif


                </div>

                <div class="d-none d-lg-block col-lg-4 align-self-xl-stretch order-1 order-lg-2 position-relative z-index-1">
                    <img src="/frontend/img/poker-chips.png" alt="" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200" class="img-fluid custom-product-image-style-1 appear-animation animated fadeInLeftShorter appear-animation-visible" style="animation-delay: 200ms;">
                </div>
            </div>
        </div>
    </section>

    @component('web._components.testimonials', [
        'bg' => 'dark'
    ])

    @endcomponent

@endsection
