<!-- Footer Area Start -->
<footer class="footer-section">
    <div class="container pt-120">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="newsletter">
                    <div class="section-text text-center">
                        <h5 class="sub-title">Subscribe Us</h5>
                        <h3 class="title">For Newsletter</h3>
                        <p>Subscribe to our newsletter to receive all the latest news and updates</p>
                    </div>
                    <form action="{{ route('subscribe-newsletter') }}" method="POST">@csrf
                        <div class="form-group d-flex align-items-center">
                            <input type="email" name="email" placeholder="Enter your email Address" required>
                            <button type="submit"><img src="{{ asset('images/icon-arrow-right-2.png') }}" alt="icon"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area pt-120">
            <div class="row">
                <div class="col-xl-12">
                    <div class="menu-item">
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ asset('images/images-logo.png') }}" alt="logo">
                        </a>
                        <ul class="footer-link">
                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                            <li><a href="{{ route('affiliate') }}">Affiliate</a></li>
                            <li><a href="{{ route('terms-conditions') }}">Terms of Services</a></li>
                            <li><a href="{{ route('privacy-policy') }}">Privacy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="copyright">
                        <div class="copy-area">
                            <p> Copyright &copy; <a href="{{ url('/') }}">{{ config('app.name', 'Betxanta') }}</a> | Designed by
                                <a href="https://contactxanta.com/" target="_blank" class="auth">Contactxanta</a>
                            </p>
                        </div>
                        <div class="social-link d-flex align-items-center">
                            <a href="javascript:void(0)"><i class="fa fa-facebook-f"></i></a>
                            <a href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
                            <a href="javascript:void(0)"><i class="fa fa-linkedin-in"></i></a>
                            <a href="javascript:void(0)"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->

<!--==================================================================-->
<script src="{{ asset('js/js-jquery.min.js') }}"></script>
<script src="{{ asset('js/js-jquery-ui.js') }}"></script>
<script src="{{ asset('js/js-bootstrap.min.js') }}"></script>
<script src="{{ asset('js/js-fontawesome.js') }}"></script>
<script src="{{ asset('js/plugin-slick.js') }}"></script>
<script src="{{ asset('js/plugin-jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/plugin-jquery.downCount.js') }}"></script>
<script src="{{ asset('js/plugin-counter.js') }}"></script>
<script src="{{ asset('js/plugin-waypoint.min.js') }}"></script>
<script src="{{ asset('js/plugin-jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/plugin-wow.min.js') }}"></script>
<script src="{{ asset('js/plugin-plugin.js') }}"></script>
<script src="{{ asset('toast-popup/toast.script.js') }}"></script>
<script src="{{ asset('js/js-main.js') }}"></script>
<script src="{{ asset('js/main-js.js') }}"></script>