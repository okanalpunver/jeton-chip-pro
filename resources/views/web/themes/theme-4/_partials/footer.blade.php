<section class="bank-cards">

    <div class="container">
        <div class="row">
            <div class="col">
                <img src="/frontend/img/cards/advantage.png" alt="">
            </div>
            <div class="col">
                <img src="/frontend/img/cards/axess.png" alt="">
            </div>
            <div class="col">
                <img src="/frontend/img/cards/bonus.png" alt="">
            </div>
            <div class="col">
                <img src="/frontend/img/cards/cardfinans.png" alt="">
            </div>
            <div class="col">
                <img src="/frontend/img/cards/combo.png" alt="">
            </div>
            <div class="col">
                <img src="/frontend/img/cards/maximum.png" alt="">
            </div>
            <div class="col">
                <img src="/frontend/img/cards/paraf.png" alt="">
            </div>
            <div class="col">
                <img src="/frontend/img/cards/world.png" alt="">
            </div>
        </div>
    </div>
</section>

<footer id="footer" class="bg-color-quaternary">
    <div class="container">
        {{-- <div class="row">
            <div class="col-lg-5">
                <ul class="social-icons custom-social-icons">

                    @if ($site->facebook)
                    <li class="social-icons-facebook">
                        <a href="{{ $site->facebook }}" target="_blank" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    @endif

                    @if ($site->twitter)
                    <li class="social-icons-twitter">
                        <a href="{{ $site->twitter }}" target="_blank" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    @endif

                    @if ($site->instagram)
                    <li class="social-icons-instagram">
                        <a href="{{ $site->instagram }}" target="_blank" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    @endif

                </ul>
            </div>
        </div> --}}
        <div class="row align-items-center">
            <div class="col-lg-8 text-center text-md-left">
                <p>&copy; {{ date('Y') }} <strong class="text-color-light font-weight-normal">{{ $site->name }}</strong>
                    {{ __('All rights reserved') }}.</p>
            </div>
            <div class="col-lg-4 text-center text-md-right">
                <img src="/frontend/img/cards/visa-master.png" alt="Payment icons" class="img-fluid">
            </div>
        </div>
    </div>
</footer>
