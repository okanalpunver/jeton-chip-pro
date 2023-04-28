@extends('web.themes.theme-1._master', [
    'title' => 'Banka Hesapları'
])

@section('content')

    <div class="container">
        <div class="pricing-table mb-4">
            @foreach ($site->bankAccounts as $bank)
                <div class="col-md-6">
                    <div class="plan">
                        <div class="plan-header">
                            <h3>{{ $bank->name }}</h3>
                        </div>
                        <div class="plan-features">
                            <table class="table">
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
                            </table>
                        </div>
                        <div class="plan-footer pt-0 pb-2">
                                {{ $bank->description }}
                            {{-- <a href="#" class="btn btn-dark btn-modern btn-outline py-2 px-4">Sign Up</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    @component('web._components.testimonials', [
        'bg' => 'light'
    ])
        
    @endcomponent
@endsection