@extends('web.themes.theme-5._master', [
    'title' => __('Bank Accounts')
])

@section('content')
    <section class="section section-no-border section-quaternary custom-padding-top-1 my-0">
        <div class="container">
            <h1 class="font-weight-bold text-color-primary mb-0">{{ __('Bank Accounts') }}</h1>

            <div class="pricing-table mb-4 mt-4 d-flex justify-content-center bg-light">
                @foreach ($site->bankAccounts as $bank)
                <div class="col-md-6 bg-light col-lg-4 mb-5 mb-lg-3">
                    <div class="card border-0 text-center rounded-0">
                        <div class="my-4 p-2">
                            <img src="{{ $bank->logo }}" class="img-fluid" alt="">
                            @if ($bank->account_holder)
                                <h5 class="mb-0 text-dark">{{ __('Account Holder') }}</h5>
                                <p class="text-dark">{{ $bank->account_holder }}</p>
                            @endif

                            @if ($bank->branch_number)
                                <h5 class="mb-0 text-dark">{{ __('Branch Number') }}</h5>
                                <p class="text-dark">{{ $bank->branch_number }}</p>
                            @endif

                            @if ($bank->account_number)
                                <h5 class="mb-0 text-dark">{{ __('Account Number') }}</h5>
                                <p class="text-dark">{{ $bank->account_number }}</p>
                            @endif

                            @if ($bank->iban)
                                <h5 class="mb-0 text-dark">{{ __('IBAN') }}</h5>
                                <p class="text-dark mb-0">{{ $bank->iban }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                    
                @endforeach
            </div>
        </div>
    </section>

    @component('web._components.testimonials', [
        'bg' => 'dark'
    ])

    @endcomponent
@endsection
