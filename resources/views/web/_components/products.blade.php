@foreach ($site->categories as $category)
    @foreach ($category->products()->orderBy('price')->get() as $product)
        <div class="row chip-container">
            <div class="col-md-1">
                <img class="d-none d-lg-block" src="{{ $product->category->photo ?? '/frontend/img/zynga-chip-small.png' }}" width="50" alt="">
            </div>
            <div class="col-md-7">
            <h1 class="@isset($size) {{ $size }} @endisset mb-0 text-center text-lg-left">
                @short_format($product->qty * 1000000) {{ ' '. $product->category->name }}
            </h1>
            </div>
            <div class="col-md-2">
                <h1 class="@isset($size) {{ $size }} @endisset mb-0 text-center text-lg-right">@money($product->price * 100, $site->currency)</h1>
            </div>
            <div class="col-md-2 text-center text-lg-right">
                <a href="/add/{{ $category->id }}/{{ $product->price }}" 
                class="@isset($btn) {{ $btn }} @else btn btn-primary btn-outline btn-rounded font-weight-bold btn-px-5 btn-py-2 text-uppercase @endisset">
                    {{ __('Buy Now') }}!
                </a>
            </div>
        </div>
        @if (!$loop->last)
            <hr class="dashed tall">
        @endif
    @endforeach
@endforeach
