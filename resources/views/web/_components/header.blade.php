{{-- <section class="page-header page-header-modern bg-color-primary page-header-md">
    <div class="container">
        <div class="row">
            <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                <h1 class="">{{ $slot }}</h1>
            </div>
            <div class="col-md-4 order-1 order-md-2 align-self-center">
                <ul class="breadcrumb d-block text-md-right breadcrumb-light">
                    <li><a href="/">Ana Sayfa</a></li>
                    <li class="active">{{ $slot }}</li>
                </ul>
            </div>
        </div>
    </div>
</section> --}}

<section class="page-header page-header-classic page-header-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                <span class="page-header-title-border visible" style="width: 85.3906px;"></span>
                <h1 data-title-border="">{{ $slot }}</h1>
            </div>
            <div class="col-md-4 order-1 order-md-2 align-self-center">
                <ul class="breadcrumb d-block text-md-right">
                    <li><a href="#">Ana Sayfa</a></li>
                    <li class="active">{{ $slot }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>