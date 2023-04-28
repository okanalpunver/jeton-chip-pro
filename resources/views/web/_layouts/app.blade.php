<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="sticky-header-reveal">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>{{ $site->name }}</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="keywords" content="{{ $site->fqdn }}" />
		<meta name="description" content="{{ $site->fqdn }}">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
		<script src="{{ asset('assets/js/web/app.js') }}" defer></script>
		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,600,700&amp;subset=latin-ext" rel="stylesheet">


		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/frontend/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="/frontend/vendor/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="/frontend/vendor/animate/animate.min.css">
		<link rel="stylesheet" href="/frontend/vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="/frontend/vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="/frontend/vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="/frontend/vendor/magnific-popup/magnific-popup.min.css">
		<link rel="stylesheet" href="/frontend/vendor/bootstrap-star-rating/css/star-rating.min.css">
		<link rel="stylesheet" href="/frontend/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/frontend/css/theme.css">
		<link rel="stylesheet" href="/frontend/css/theme-elements.css">
		<link rel="stylesheet" href="/frontend/css/theme-blog.css">
		<link rel="stylesheet" href="/frontend/css/theme-shop.css">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="/frontend/vendor/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="/frontend/vendor/rs-plugin/css/layers.css">
		<link rel="stylesheet" href="/frontend/vendor/rs-plugin/css/navigation.css">

		<!-- Demo CSS -->
		<link rel="stylesheet" href="/frontend/css/themes/{{ $site->theme }}.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/frontend/css/skins/{{ $site->theme }}-{{ $site->skin }}.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/frontend/css/custom.css">

		<!-- Head Libs -->
		<script src="/frontend/vendor/modernizr/modernizr.min.js"></script>

	</head>
	<body>

		@include('web.themes.'. $site->theme.'._master' ?? 'theme-1._master')

		<!-- Vendor -->
		<script src="/frontend/vendor/jquery/jquery.min.js"></script>
		<script src="/frontend/vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="/frontend/vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="/frontend/vendor/jquery.cookie/jquery.cookie.min.js"></script>
		<script src="/frontend/vendor/popper/umd/popper.min.js"></script>
		<script src="/frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="/frontend/vendor/common/common.min.js"></script>
		<script src="/frontend/vendor/jquery.validation/jquery.validate.min.js"></script>
		<script src="/frontend/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="/frontend/vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="/frontend/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="/frontend/vendor/isotope/jquery.isotope.min.js"></script>
		<script src="/frontend/vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="/frontend/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="/frontend/vendor/vide/jquery.vide.min.js"></script>
		<script src="/frontend/vendor/vivus/vivus.min.js"></script>
		<script src="/frontend/vendor/bootstrap-star-rating/js/star-rating.min.js"></script>
		<script src="/frontend/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="/frontend/js/theme.js"></script>

		<!-- Current Page Vendor and Views -->
		<script src="/frontend/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="/frontend/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        <!-- Demo -->
        <script src="/frontend/js/demos/demo-gym.js"></script>

        <!-- Theme Custom -->
		<script src="/frontend/js/custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="/frontend/js/theme.init.js"></script>

		<!-- Examples -->
		<script src="/frontend/js/views/view.shop.js"></script>

		@if ($site->analytics_id)
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

				ga('create', '{{ $site->analytics_id }}', 'auto');
				ga('send', 'pageview');
			</script>
		@endif

	@if ($site->tawk_to)
		<script type="text/javascript">
			var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
			(function(){
			var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
			s1.async=true;
			s1.src='https://embed.tawk.to/{{ $site->tawk_to }}/default';
			s1.charset='UTF-8';
			s1.setAttribute('crossorigin','*');
			s0.parentNode.insertBefore(s1,s0);
			})();
		</script>
	@endif
	</body>
</html>
