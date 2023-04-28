<footer id="footer" class="bg-color-dark">
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
            <div class="col-lg-12 text-center">
                <p>&copy; {{ date('Y') }} <strong class="text-color-light font-weight-normal">{{ $site->name }}</strong>
                    {{ __('All rights reserved') }}.</p>
            </div>
        </div>
    </div>
</footer>
