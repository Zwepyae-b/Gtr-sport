<footer class="gtr-footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <h5 class="footer-brand">
                    <span class="brand-gtr">GT-R</span>
                    <span class="brand-sport">SPORT</span>
                </h5>
                <p class="footer-text">The ultimate destination for Nissan GT-R enthusiasts. Explore the legendary history, specifications, and performance of the iconic GT-R series.</p>
                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-2">
                <h6 class="footer-title">Explore</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('gtr.index') }}">GT-R Models</a></li>
                    <li><a href="{{ route('gtr.history') }}">History</a></li>
                    <li><a href="{{ route('gtr.compare') }}">Compare</a></li>
                    <li><a href="{{ route('nismo') }}">NISMO</a></li>
                    <li><a href="{{ route('gallery.index') }}">Gallery</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h6 class="footer-title">Community</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('reviews.index') }}">Reviews</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    @auth
                    <li><a href="{{ route('favorites.index') }}">Favorites</a></li>
                    @endauth
                </ul>
            </div>
            <div class="col-lg-4">
                <h6 class="footer-title">Quick Facts</h6>
                <div class="footer-facts">
                    <div class="fact-item">
                        <i class="fas fa-car"></i>
                        <span>4 Generations</span>
                    </div>
                    <div class="fact-item">
                        <i class="fas fa-horse"></i>
                        <span>Up to 600 HP</span>
                    </div>
                    <div class="fact-item">
                        <i class="fas fa-clock"></i>
                        <span>2.4s 0-100km/h</span>
                    </div>
                    <div class="fact-item">
                        <i class="fas fa-trophy"></i>
                        <span>Racing Legend</span>
                    </div>
                </div>
            </div>
        </div>
        <hr class="footer-divider">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <p class="footer-copyright">&copy; {{ date('Y') }} GT-R Sport. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="footer-copyright">Built with <i class="fas fa-heart text-danger"></i> for GT-R enthusiasts</p>
            </div>
        </div>
    </div>
</footer>
