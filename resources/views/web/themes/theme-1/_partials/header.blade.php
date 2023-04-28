<header id="header" class="@if (request()->route()->named('web.home')) header-transparent @endif header-effect-shrink"
    data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body border-0">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column flex-row w-auto">
                    <div class="header-logo">
                        <a href="/" class="text-decoration-none">
                            {{-- <img src="/frontend/img/logo-flat.png" class="img-fluid" width="87" height="42" alt="" /> --}}
                            <h3 class="mb-0 text-nowrap">{{ $site->name }}</h3>
                        </a>
                    </div>
                </div>
                <div class="header-column w-100 pl-lg-5">
                    <div class="header-nav w-100 p-0">
                        <div class="header-nav header-nav-links justify-content-start w-100">
                            <div
                                class="header-nav-main header-nav-main-arrows header-nav-main-effect-2 header-nav-main-sub-effect-1 w-100">
                                <nav class="collapse w-100">
                                    <ul class="nav nav-pills flex-column flex-lg-row w-100" id="mainNav">
                                        <li><a class="{{ active('web.home') }}" href="/">Ana Sayfa</a></li>
                                        <li><a class="{{ active('web.about') }}"
                                                href="{{ route('web.about') }}">Hakkımızda</a></li>
                                        <li><a class="{{ active('web.bank-account') }}"
                                                href="{{ route('web.bank-account') }}">Banka Hesapları</a></li>
                                        <li><a class="{{ active('web.contact') }}"
                                                href="{{ route('web.contact') }}">İletişim</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-column flex-row w-auto">
                    <div class="header-nav-features header-nav-features-center header-nav-features-no-border px-0">
                        <div class="header-nav-feature header-nav-features-cart d-inline-flex ml-2">
                            <a href="#" class="header-nav-features-toggle">
                                <img src="/frontend/img/icons/icon-cart.svg" width="14" alt=""
                                    class="header-nav-top-icon-img">
                                @if (session('cart'))
                                <span class="cart-info">
                                    <span class="cart-qty">{{ count(session('cart')) }}</span>
                                </span>
                                @endif
                            </a>
                            <div class="header-nav-features-dropdown" id="headerTopCartDropdown">
                                @if(session('cart'))
                                <ol class="mini-products-list">
                                    @php
                                    $total = 0;
                                    @endphp
                                    @foreach(session('cart') as $id => $item)
                                    @php
                                    $total += $item['amount'];
                                    @endphp

                                    <li class="item">
                                        <a href="#" title="{{ $item['name']}}" class="product-image border-0 pt-3">
                                            <img src="{{ $item['photo'] }}" alt="">
                                        </a>
                                        <div class="product-details">
                                            <p class="product-name">
                                                <a href="#">{{ $item['name'] }} </a>
                                            </p>
                                            <p class="qty-price">
                                                {{ $item['qty'] }} Adet
                                            </p>
                                        </div>
                                    </li>
                                    @endforeach

                                </ol>
                                <div class="totals">
                                    <span class="label">Toplam:</span>
                                    <span class="price-total"><span class="price">@money($total * 100, $site->currency)</span></span>
                                </div>
                                <div class="actions">
                                    <a class="btn btn-primary float-right" href="{{ route('web.register') }}">Siparişi
                                        Tamamla</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button class="btn header-btn-collapse-nav ml-3" data-toggle="collapse"
                        data-target=".header-nav-main nav">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
