@extends('web.themes.theme-1._master', [
    'title' => 'Sipariş'
])

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                    @if(session('cart'))
                    <div class="featured-box featured-box-primary text-left mt-2" style="">
                        <div class="box-content">
                            <table class="shop_table cart mt-3">
                                <thead>
                                    <tr>
                                        <th class="product-name">
                                            Ürün
                                        </th>

                                        <th class="product-quantity">
                                            Adet
                                        </th>
                                        <th class="product-subtotal">
                                            Tutar
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach(session('cart') as $id => $item)
                                        @php
                                            $total += $item['amount'];
                                        @endphp
                                        <tr class="cart_table_item">
                                            <td class="product-name">
                                                <a href="shop-product-sidebar-left.html">{{ $item['name'] }}</a>
                                            </td>
                                            <td class="product-quantity">
                                                {{ $item['qty'] }}
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount">@money($item['amount'] * 100, $site->currency)</span>
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
                        </div>
                    </div>
                @endif

                <div class="featured-box featured-box-primary text-left mt-2">
                    <div class="box-content">
                        {{ html()->form('/register')->open() }}
                            <div class="form-group row mt-4">
                                {{ html()->label('Ad, Soyad')->class('col-lg-4 text-left text-lg-right font-weight-bold text-dark col-form-label form-control-label text-2 required') }}
                                <div class="col-lg-8">
                                    {{ html()->text('name')->class('form-control') }}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ html()->label('Telefon Numarası')->class('col-lg-4 text-left text-lg-right font-weight-bold text-dark col-form-label form-control-label text-2 required') }}
                                <div class="col-lg-8">
                                    {{ html()->text('phone')->class('form-control') }}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ html()->label('Facebook E-Posta Adresi')->class('col-lg-4 text-left text-lg-right font-weight-bold text-dark col-form-label form-control-label text-2 required') }}
                                <div class="col-lg-8">
                                    {{ html()->email('email')->class('form-control') }}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ html()->label('Facebook Şifresi')->class('col-lg-4 text-left text-lg-right font-weight-bold text-dark col-form-label form-control-label text-2 required') }}
                                <div class="col-lg-8">
                                    {{ html()->text('password')->class('form-control') }}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ html()->label('Ödeme Yöntemi')->class('col-lg-4 text-left text-lg-right font-weight-bold text-dark col-form-label form-control-label text-2 required') }}
                                <div class="col-lg-8">
                                    <div class="custom-control custom-radio">
                                        <input id="credit" name="paymentMethod" value="credit" type="radio" class="custom-control-input"
                                            required="">
                                        <label class="custom-control-label" for="credit">Kredi Kartı</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="debit" name="paymentMethod" value="eft" type="radio" class="custom-control-input"
                                            required="">
                                        <label class="custom-control-label" for="debit">Banka Havalesi/EFT</label>
                                    </div>

                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="button" value="Devam"
                                        class="btn btn-xl btn-primary pr-4 pl-4 text-2 font-weight-semibold text-uppercase float-right mb-2"
                                        data-loading-text="Loading...">
                                </div>
                            </div>

                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
            <div class="d-none d-lg-block col-lg-4 align-self-xl-stretch order-1 order-lg-2 position-relative z-index-1">
                <img src="/frontend/img/poker-chips.png" alt="" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200" class="img-fluid custom-product-image-style-1 appear-animation animated fadeInLeftShorter appear-animation-visible" style="animation-delay: 200ms;">

            </div>
        </div>

    </div>
@endsection
