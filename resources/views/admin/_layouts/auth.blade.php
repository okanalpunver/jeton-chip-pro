<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!--end::Fonts -->

		<!--begin::Page Custom Styles(used by this page) -->
		<link href="/assets/css/demo1/pages/general/login/login-1.css" rel="stylesheet" type="text/css" />

		<!--end::Page Custom Styles -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="/assets/css/demo1/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles -->

		<link rel="shortcut icon" href="/assets/media/logos/favicon.ico" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

					<!--begin::Aside-->
					<div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url(/assets/media//bg/bg-4.jpg);">
						{{-- <div class="kt-grid__item">
							<a href="#" class="kt-login__logo">
								<img src="/assets/media/logos/logo-4.png">
							</a>
						</div> --}}
						<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
							<div class="kt-grid__item kt-grid__item--middle">
								<h3 class="kt-login__title">Hoşgeldiniz!</h3>
								<h4 class="kt-login__subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nisi ipsum.</h4>
							</div>
						</div>
						<div class="kt-grid__item">
							<div class="kt-login__info">
								<div class="kt-login__copyright">
									&copy {{ date('Y') }} {{ config('app.name', 'Laravel') }}
								</div>
								{{-- <div class="kt-login__menu">
									<a href="#" class="kt-link">{{ __('Terms of Service') }}</a>
									<a href="#" class="kt-link">{{ __('Contact') }}</a>
								</div> --}}
							</div>
						</div>
					</div>

					<!--begin::Aside-->

					<!--begin::Content-->
					<div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

						<!--begin::Body-->
						<div class="kt-login__body">

							<!--begin::Signin-->
							<div class="kt-login__form">
								<div class="kt-login__title">
									<h3>@yield('title')</h3>
								</div>

								@if (session('status'))
									<div class="alert alert-outline-success" role="alert">
										<div class="alert-text">{{ session('status') }}</div>
									</div>
								@endif

								@yield('content')
							</div>

							<!--end::Signin-->
						</div>

						<!--end::Body-->
					</div>

					<!--end::Content-->
				</div>
			</div>
		</div>

		<!-- end:: Page -->

	</body>

	<!-- end::Body -->
</html>