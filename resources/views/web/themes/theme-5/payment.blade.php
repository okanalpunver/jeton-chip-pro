@extends('web.themes.theme-5._master', [
    'title' => 'Ödeme'
])

@section('content')
    <section class="section section-no-border section-quaternary custom-padding-top-1 my-0 pb-0">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-7 col-lg-9">
                    <h1 class="font-weight-bold text-color-primary mb-0">Ödeme (@if ($order->order_type == 'eft') EFT @else KREDİ KARTI @endif)</h1>
                    
                    {{ html()->form(route('web.order.store'))->open() }}
                        @if ($order->order_type == 'eft')

                        <div class="form-group row">
                            {{ html()->label('Ad, Soyad')->class('col-lg-4 text-left text-lg-right font-weight-bold col-form-label form-control-label text-2 required') }}
                            <div class="col-lg-8">
                                {{ html()->text('name')->value($order->user->name)->class('form-control form-control-lg ')}}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ html()->label('TC Kimlik No')->class('col-lg-4 text-left text-lg-right font-weight-bold col-form-label form-control-label text-2 required') }}
                            <div class="col-lg-8">
                                {{ html()->text('tc_no')->class('form-control form-control-lg ')}}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ html()->label('Telefon')->class('col-lg-4 text-left text-lg-right font-weight-bold col-form-label form-control-label text-2 required') }}
                            <div class="col-lg-8">
                                {{ html()->text('phone')->value($order->phone)->class('form-control form-control-lg ')}}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ html()->label('Banka')->class('col-lg-4 text-left text-lg-right font-weight-bold col-form-label form-control-label text-2 required') }}
                            <div class="col-lg-8">
                                {{ html()->select('bank_account_id', \App\Models\BankAccount::pluck('name', 'id'))->class('form-control form-control-lg') }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="submit" value="Ödeme Bildirimi Gönder"
                                    class="btn btn-xl btn-primary pr-4 pl-4 text-2 font-weight-semibold text-uppercase float-right mb-2"
                                    data-loading-text="Loading...">
                            </div>
                        </div> 
                            
                            
                        @else
                            
                        @endif

                    {{ html()->form('/odeme')->open() }}

                </div>
                <div class="col-md-5 col-lg-3">
                    <img src="/frontend/img/zynga-lady.png" alt="">
                </div>
            </div>
        </div>
    </section>

    @component('web._components.testimonials', [
        'bg' => 'dark'
    ])
        
    @endcomponent

@endsection