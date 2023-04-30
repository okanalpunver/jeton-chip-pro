@if (request()->route()->named('web.home'))
    <header id="header" class="header-floating-bar" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'reveal', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 116, 'stickySetTop': '0px', 'stickyChangeLogo': false}">
@else
    <header id="header" class="header-floating-bar header-floating-bar-static-sticky" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'reveal', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 0, 'stickySetTop': '0px', 'stickyChangeLogo': false}">
@endif
    <div class="header-body bg-color-dark box-shadow-none">
        <div class="header-container header-container-height-sm container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="/" class="text-decoration-none">
                                @isset($site->logo)
                                    <img alt="{{ $site->name }}" height="80" src="/storage/{{ $site->logo }}">
                                @else
                                    <h3 class="mb-0 font-weight-bolder text-color-light text-nowrap">
                                        @php
                                            $siteName = explode(' ', $site->name);
                                        @endphp
                                        @isset($siteName[0])
                                            {{ $siteName[0] }}
                                        @endisset
                                        @isset($siteName[1])
                                            <span class="text-color-primary">{{ $siteName[1] }}</span>
                                        @endisset
                                    </h3>
                                @endisset
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end mr-lg-4">
                    <div class="header-row">
                        <div
                            class="header-nav header-nav-links header-nav-dropdowns-dark header-nav-force-light-text header-nav-force-light-text-active-skin-color order-2 order-lg-1">
                            <div
                                class="header-nav-main header-nav-main-mobile-dark header-nav-main-dropdown-no-borders header-nav-main-clone-items header-nav-main-slide header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li><a class="nav-link {{ active('web.home') }}" href="/">{{ __('Home') }}</a></li>
                                        @if (count($site->news) > 0)
                                            <li><a class="nav-link {{ active('web.news*') }}" href="{{ route('web.news') }}">{{ __('News') }}</a></li>
                                        @endif
                                        <li><a class="nav-link {{ active('web.about') }}" href="{{ route('web.about') }}">{{ __('About Us') }}</a></li>
                                        @if (count($site->bankAccounts) > 0)
                                            <li><a class="nav-link {{ active('web.bank-account') }}" href="{{ route('web.bank-account') }}">{{ __('Bank Accounts') }}</a></li>
                                        @endif
                                        <li><a class="nav-link {{ active('web.contact') }}" href="{{ route('web.contact') }}">{{ __('Contact') }}</a></li>
                                        <!-- Authentication Links -->
                                        @guest
                                            <li class="ml-lg-5">
                                                <a class="nav-link" href="{{ route('web.login') }}">{{ __('Login') }}</a>
                                            </li>
                                            @if (Route::has('web.register'))
                                                <li>
                                                    <a class="nav-link" href="{{ route('web.register') }}">{{ __('Register') }}</a>
                                                </li>
                                            @endif
                                        @else
                                            <li class="dropdown ml-lg-5">
                                                <a id="navbarDropdown" class="dropdown-item dropdown-toggle" href="#" >
                                                    {{ Auth::user()->name }}
                                                </a>



                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <li><a class="dropdown-item" href="#"
                                                    onclick="
                                                 copyRefCode(' {{ env('APP_URL') . "/register" . "?ref=" . \Illuminate\Support\Facades\Auth::user()->ref_code   }}')">
                                                        Referans Linki
                                                    </a>
                                                    </li>

                                                    <li><a class="dropdown-item" href="{{ route('web.logout') }}"
                                                           onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>
                                                    </li>
                                                    <form id="logout-form" action="{{ route('web.logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </ul>
                                            </li>
                                        @endguest
                                    </ul>
                                </nav>
                            </div>
                            <a class="btn btn-primary btn-join-now text-uppercase custom-font-weight-medium d-none d-lg-flex"
                                href="{{ route('web.cart.show') }}">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse"
                                data-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

            <script>
               function copyRefCode(param){
                   // Get the text field
                   var copyText = param;

                   // Copy the text inside the text field
                   navigator.clipboard.writeText(copyText);

                   // Alert the copied text
                   alert("Referans linkiniz: " + copyText);
                }
            </script>

