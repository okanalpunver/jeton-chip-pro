<!--begin: Head -->
<div class="kt-head kt-head--skin-dark" style="background-image: url(/assets/media/misc/bg-1.jpg)">
    <h3 class="kt-head__title">
        {{ $site->name }}
        <div class="kt-head__sub">{{ $site->fqdn }}</div>
    </h3>
</div>
<!--end: Head -->
<div>
    <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
        @foreach ($sites as $site)
        <a href="{{ route('admin.site.change', $site) }}" class="kt-notification__item">
                <div class="kt-notification__item-icon"> {!! icon('Globe') !!} </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title"> {{ $site->name }} </div>
                    <div class="kt-notification__item-time"> {{ $site->fqdn }} </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
