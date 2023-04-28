<!-- begin:: Header Menu -->
{{-- <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button> --}}
{{-- <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper"> --}}
    <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile kt-header-menu--layout-default " >
        {!! $headerMenu !!}
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel">
                <a href="https://{{ $site->fqdn }}" target="_blank" class="kt-menu__link">
                    {{ $site->name }}
                </a>
            </li>
        </ul>
    </div>
{{-- </div> --}}
<!-- end:: Header Menu -->
