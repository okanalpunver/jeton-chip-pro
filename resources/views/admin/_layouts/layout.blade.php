<!-- begin:: Page -->
@include('admin._partials._header-base-mobile')
<div class="kt-grid kt-grid--hor kt-grid--root" id="app">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
		@include('admin._partials._aside-base')
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
			@include('admin._partials._header-base')
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
				@yield('content')
            </div>
			{{-- @include('admin._partials._footer-base') --}}
        </div>
    </div>
</div>
<!-- end:: Page -->
{{-- @include('admin._partials._layout-quick-panel') --}}
@include('admin._partials._layout-scrolltop')
{{-- @include('admin._partials._layout-toolbar') --}}
{{-- @include('admin._partials._layout-demo-panel') --}}
{{-- @include('admin._partials._layout-chat') --}}