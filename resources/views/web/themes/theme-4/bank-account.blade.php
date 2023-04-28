@extends('web.themes.theme-4._master', [
    'title' => __('Bank Accounts')
])

@section('content')
    <section class="section section-no-border section-dark custom-padding-top-1 mb-0">
        <div class="container">
            <h1 class="font-weight-bold text-color-primary mb-0">{{ __('Bank Accounts') }}</h1>

            <div class="pricing-table mb-4 mt-4 d-flex justify-content-center">
                @foreach ($site->bankAccounts as $bank)
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                    <div class="card flip-card text-center rounded-0" style="background-color: #212529">
                        <div class="flip-front p-5">
                            <div class="flip-content my-4 p-2">
                                <img src="{{ $bank->logo }}" class="img-fluid" alt="">
                                @if ($bank->is_free_atm)
                                    <h4 class="font-weight-bold text-color-primary text-4">{{ __('No commission from ATM') }}</h4>
                                @else
                                    <h4 class="font-weight-bold text-color-primary text-4">&nbsp;</h4>
                                @endif
                                <div class="d-flex align-items-center">
                                    <h3 class="text-dark" style="margin-bottom:-3px">7/24 {{ __('Payment') }}</h3>
                                    <img src="/frontend/img/paytr.png" height="41" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="flip-back d-flex align-items-center p-2">
                            <div class="flip-content d-flex flex-column w-100 h-100 justify-content-center">

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

                                {{-- <table class="table table-light">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center">{{ $bank->description }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border-top-0"><strong>Hesap Sahibi</strong></td>
                                            <td class="border-top-0">{{ $bank->account_holder }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Şube No</strong></td>
                                            <td>{{ $bank->branch_number }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Hesap No</strong></td>
                                            <td>{{ $bank->account_number }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>IBAN</strong></td>
                                            <td>{{ $bank->iban }}</td>
                                        </tr>
                                    </tbody>
                                </table> --}}
                            </div>
                        </div>
                    </div>
                </div>
                    {{-- <div class="col-md-6">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">{{ $bank->description }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border-top-0"><strong>Hesap Sahibi</strong></td>
                                    <td class="border-top-0">{{ $bank->account_holder }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Şube No</strong></td>
                                    <td>{{ $bank->branch_number }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Hesap No</strong></td>
                                    <td>{{ $bank->account_number }}</td>
                                </tr>
                                <tr>
                                    <td><strong>IBAN</strong></td>
                                    <td>{{ $bank->iban }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div> --}}
                @endforeach
            </div>
        </div>
    </section>

    @component('web._components.testimonials', [
        'bg' => 'dark'
    ])

    @endcomponent
@endsection
