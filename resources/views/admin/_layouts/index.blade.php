<!DOCTYPE html>
<!-- Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 7Author: KeenThemesWebsite: http://www.keenthemes.com/Contact: support@keenthemes.comFollow: www.twitter.com/keenthemesDribbble: www.dribbble.com/keenthemesLike: www.facebook.com/keenthemesPurchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemesRenew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemesLicense: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="Updates and statistics">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!--begin::Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {
                    families: ["Poppins:400,500,600,700", "Roboto:400,500,600,700"]
                },
                active: function () {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <!--end::Fonts -->
        <script src="{{ mix('assets/js/admin/app.js') }}" defer></script>
        <!--begin::Page Vendors Styles(used by this page) -->
        <link href="/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Page Vendors Styles -->
        <!--begin::Global Theme Styles(used by all pages) -->
        <link href="/assets/vendors/global/vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/demo1/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles -->
        <!--begin::Layout Skins(used by all pages) -->
        <link href="/assets/css/demo1/skins/header/base/light.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/demo1/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/demo1/skins/brand/dark.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/demo1/skins/aside/dark.css" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets/css/admin/app.css') }}" rel="stylesheet">

        <!--end::Layout Skins -->
        <link rel="shortcut icon" href="/assets/media/logos/favicon.ico" />
    </head>
    <!-- end::Head -->
    <!-- begin::Body -->
    <body class="{{ (Cookie::get('kt_aside_toggle_state') == 'on') ? 'kt-aside--minimize' : '' }} kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed" >
        @include('admin._layouts.layout')
        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {
                "colors": {
                    "state": {
                        "brand": "#5d78ff",
                        "dark": "#282a3c",
                        "light": "#ffffff",
                        "primary": "#5867dd",
                        "success": "#34bfa3",
                        "info": "#36a3f7",
                        "warning": "#ffb822",
                        "danger": "#fd3995"
                    },
                    "base": {
                        "label": [
                            "#c5cbe3",
                            "#a1a8c3",
                            "#3d4465",
                            "#3e4466"],
                        "shape": [
                            "#f0f3ff",
                            "#d9dffa",
                            "#afb4d4",
                            "#646c9a"]
                    }
                }
            };
        </script>
        <!-- end::Global Config -->
        <!--begin::Global Theme Bundle(used by all pages) -->
        <script src="/assets/vendors/global/vendors.bundle.js" type="text/javascript"></script>
        <script src="/assets/js/demo1/scripts.bundle.js" type="text/javascript"></script>
        <!--end::Global Theme Bundle -->
        <!--begin::Page Vendors(used by this page) -->
        <script src="/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
        <!--end::Page Vendors -->
        <!--begin::Page Scripts(used by this page) -->
        @includeWhen(session('flash'), 'admin._components.flash')
        @stack('scripts')
        <!--end::Page Scripts -->
    </body>
    <!-- end::Body -->
</html>
