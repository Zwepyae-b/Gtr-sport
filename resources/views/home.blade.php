@extends('layouts.app')

@section('title', 'GT-R Sport - Nissan GT-R Series')

@section('content')
<!-- Hero Section -->
<section class="gtr-hero">
    <div class="hero-bg-overlay"></div>
    <div class="container hero-content">
        <div class="hero-badge">LEGENDARY PERFORMANCE</div>
        <h1 class="hero-title">
            <span class="hero-title-line">The Legend</span>
            <span class="hero-title-line hero-title-accent">Nissan GT-R</span>
        </h1>
        <p class="hero-subtitle">Four generations of pure performance. From the RB26DETT to the VR38DETT, the GT-R has defined automotive excellence since 1969.</p>
        <div class="hero-actions">
            <a href="{{ route('gtr.index') }}" class="btn-gtr-primary">
                <i class="fas fa-car"></i> Explore Models
            </a>
            <a href="{{ route('gtr.history') }}" class="btn-gtr-outline">
                <i class="fas fa-history"></i> View History
            </a>
        </div>
        <div class="hero-stats">
            <div class="hero-stat">
                <span class="stat-number">{{ $totalModels }}+</span>
                <span class="stat-label">GT-R Models</span>
            </div>
            <div class="hero-stat-divider"></div>
            <div class="hero-stat">
                <span class="stat-number">{{ $totalHorsepower }}</span>
                <span class="stat-label">Max Horsepower</span>
            </div>
            <div class="hero-stat-divider"></div>
            <div class="hero-stat">
                <span class="stat-number">4</span>
                <span class="stat-label">Generations</span>
            </div>
            <div class="hero-stat-divider"></div>
            <div class="hero-stat">
                <span class="stat-number">2.4</span>
                <span class="stat-label">Sec 0-100</span>
            </div>
        </div>
    </div>
    <div class="hero-scroll-indicator">
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

<!-- Featured GT-R Models -->
<section class="gtr-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">FEATURED</span>
            <h2 class="section-title">Featured GT-R Models</h2>
            <p class="section-subtitle">Handpicked models that define the GT-R legacy</p>
        </div>
        <div class="row g-4">
            @foreach($featuredModels as $model)
            <div class="col-lg-4 col-md-6">
                <x-gtr-card :model="$model" />
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('gtr.index') }}" class="btn-gtr-primary">
                View All Models <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Performance Statistics -->
<section class="gtr-section gtr-section-dark">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">PERFORMANCE</span>
            <h2 class="section-title">Built to Dominate</h2>
            <p class="section-subtitle">Numbers that speak louder than words</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="performance-card">
                    <div class="performance-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <div class="performance-number" data-count="{{ $totalHorsepower }}">0</div>
                    <div class="performance-label">Max Horsepower</div>
                    <div class="performance-detail">VR38DETT NISMO</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="performance-card">
                    <div class="performance-icon">
                        <i class="fas fa-stopwatch"></i>
                    </div>
                    <div class="performance-number" data-count="2.4">0</div>
                    <div class="performance-label">0-100 km/h (seconds)</div>
                    <div class="performance-detail">NISMO Special Edition</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="performance-card">
                    <div class="performance-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div class="performance-number" data-count="315">0</div>
                    <div class="performance-label">Top Speed (km/h)</div>
                    <div class="performance-detail">Electronically Limited</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="performance-card">
                    <div class="performance-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="performance-number" data-count="50">0</div>
                    <div class="performance-label">Years of Legacy</div>
                    <div class="performance-detail">1969 - Present</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- GT-R Generations Timeline -->
<section class="gtr-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">LEGACY</span>
            <h2 class="section-title">GT-R Generations</h2>
            <p class="section-subtitle">A timeline of automotive perfection</p>
        </div>
        <div class="timeline">
            <div class="timeline-item timeline-left" data-aos="fade-right">
                <div class="timeline-content">
                    <div class="timeline-year">1989-1994</div>
                    <h3 class="timeline-title">R32 - "Godzilla"</h3>
                    <p class="timeline-text">The legend begins. RB26DETT, ATTESA E-TS AWD. Dominated Australian Touring Car Championship and earned the "Godzilla" nickname.</p>
                    <a href="{{ route('gtr.show', 'nissan-skyline-gt-r-r32') }}" class="btn-gtr-outline-sm">Learn More</a>
                </div>
            </div>
            <div class="timeline-item timeline-right" data-aos="fade-left">
                <div class="timeline-content">
                    <div class="timeline-year">1995-1998</div>
                    <h3 class="timeline-title">R33 - Evolution</h3>
                    <p class="timeline-text">Refined and improved. Stiffer chassis, better weight distribution. Set a Nurburgring lap record for a production sedan: 8:19.</p>
                    <a href="{{ route('gtr.show', 'nissan-skyline-gt-r-r33') }}" class="btn-gtr-outline-sm">Learn More</a>
                </div>
            </div>
            <div class="timeline-item timeline-left" data-aos="fade-right">
                <div class="timeline-content">
                    <div class="timeline-year">1999-2002</div>
                    <h3 class="timeline-title">R34 - Ultimate Skyline</h3>
                    <p class="timeline-text">The pinnacle of the Skyline GT-R. Revolutionary MFD display, 6-speed manual, ATTESA E-TS with GT-R mode. The most collectible GT-R.</p>
                    <a href="{{ route('gtr.show', 'nissan-skyline-gt-r-r34') }}" class="btn-gtr-outline-sm">Learn More</a>
                </div>
            </div>
            <div class="timeline-item timeline-right" data-aos="fade-left">
                <div class="timeline-content">
                    <div class="timeline-year">2007-2025</div>
                    <h3 class="timeline-title">R35 - Godzilla Reborn</h3>
                    <p class="timeline-text">A standalone masterpiece. VR38DETT twin-turbo V6, DCT transmission, advanced ATTESA. Supercar killer at a fraction of the price.</p>
                    <a href="{{ route('gtr.show', 'nissan-gt-r-r35') }}" class="btn-gtr-outline-sm">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- NISMO Section -->
@if($nismoModels->count())
<section class="gtr-section gtr-section-nismo">
    <div class="container">
        <div class="section-header">
            <span class="section-badge section-badge-nismo">NISMO</span>
            <h2 class="section-title text-white">NISMO - Racing Heritage</h2>
            <p class="section-subtitle text-white-50">Nissan Motorsport International. Where the track meets the road.</p>
        </div>
        <div class="row g-4">
            @foreach($nismoModels as $model)
            <div class="col-lg-4 col-md-6">
                <x-gtr-card :model="$model" />
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('nismo') }}" class="btn-gtr-nismo">
                <i class="fas fa-flag-checkered"></i> Explore NISMO
            </a>
        </div>
    </div>
</section>
@endif

<!-- Latest Reviews -->
@if($latestReviews->count())
<section class="gtr-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">COMMUNITY</span>
            <h2 class="section-title">Latest Reviews</h2>
            <p class="section-subtitle">What GT-R enthusiasts are saying</p>
        </div>
        <div class="row g-4">
            @foreach($latestReviews as $review)
            <div class="col-lg-4 col-md-6">
                <div class="review-card">
                    <div class="review-header">
                        <div class="review-rating">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-secondary' }}"></i>
                            @endfor
                        </div>
                        <span class="review-model">{{ $review->gtrModel->name }}</span>
                    </div>
                    <p class="review-text">{{ \Str::limit($review->comment, 150) }}</p>
                    <div class="review-footer">
                        <span class="review-author">
                            <i class="fas fa-user-circle me-1"></i>{{ $review->user->name }}
                        </span>
                        <span class="review-date">{{ $review->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('reviews.index') }}" class="btn-gtr-outline">
                View All Reviews <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="gtr-cta">
    <div class="container text-center">
        <h2 class="cta-title">Ready to Experience the Legend?</h2>
        <p class="cta-text">Join our community of GT-R enthusiasts and share your passion.</p>
        <div class="cta-actions">
            @auth
                <a href="{{ route('reviews.index') }}" class="btn-gtr-primary">
                    <i class="fas fa-pen"></i> Write a Review
                </a>
            @else
                <a href="{{ route('register') }}" class="btn-gtr-primary">
                    <i class="fas fa-user-plus"></i> Join Now
                </a>
            @endauth
            <a href="{{ route('gtr.compare') }}" class="btn-gtr-outline">
                <i class="fas fa-balance-scale"></i> Compare Models
            </a>
        </div>
    </div>
</section>
@endsection
