<footer id="footer" class="bg-dark border-0 mt-0">

    <div class="footer-copyright bg-dark">
        <div class="container py-2">
            <div class="row justify-content-between py-4">
                <div class="col-auto">
                    <p class="mb-0">&copy; {{ date('Y') }} <a href="https://{{ $site->fqdn }}">{{ $site->name }}</a>.
                        Her Hakkı Saklıdır.</p>
                </div>
                <div class="col-auto">
                    <ul class="footer-social-icons social-icons social-icons-clean social-icons-icon-light mb-0">
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
            </div>
        </div>
    </div>
</footer>