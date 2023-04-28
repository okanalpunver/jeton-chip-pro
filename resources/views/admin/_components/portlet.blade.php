<div class="kt-portlet kt-portlet--mobile">
    @isset($title)
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $title }} @isset($desc1) <small>{{ $desc }}</small> @endisset
                </h3>
            </div>
        </div>
    @endisset
    <div class="kt-portlet__body">
        {{ $slot }}
    </div>
</div>