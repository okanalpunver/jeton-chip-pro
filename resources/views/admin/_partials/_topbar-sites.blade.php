<!--begin: Notifications -->
<div class="kt-header__topbar-item dropdown">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="true">
            
        <span class="kt-header__topbar-icon kt-pulse kt-pulse--brand">
            {!! icon('Globe') !!}
            <span class="kt-pulse__ring"></span> 
        </span>
        
        <!--                Use dot badge instead of animated pulse effect:                 <span class="kt-badge kt-badge--dot kt-badge--notify kt-badge--sm kt-badge--brand"></span>            -->
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">
        <form>
	        @include('admin._partials._dropdown-sites')
        </form>
    </div>
</div>
<!--end: Notifications -->