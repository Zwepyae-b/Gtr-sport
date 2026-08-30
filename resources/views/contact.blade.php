@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <h1 class="page-title">Contact Us</h1>
        <p class="page-subtitle">Get in touch with the GT-R Sport team</p>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="contact-form-card">
                    <h3 class="detail-section-title mb-4"><i class="fas fa-envelope me-2"></i>Send Us a Message</h3>

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="filter-label">Your Name</label>
                                <input type="text" name="name" class="form-control filter-input" value="{{ old('name') }}" required placeholder="John Doe">
                                @error('name')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="filter-label">Your Email</label>
                                <input type="email" name="email" class="form-control filter-input" value="{{ old('email') }}" required placeholder="john@example.com">
                                @error('email')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="filter-label">Subject</label>
                                <input type="text" name="subject" class="form-control filter-input" value="{{ old('subject') }}" required placeholder="How can we help you?">
                                @error('subject')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="filter-label">Message</label>
                                <textarea name="message" class="form-control filter-input" rows="5" required placeholder="Tell us about your GT-R passion...">{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-gtr-primary">
                                    <i class="fas fa-paper-plane me-1"></i> Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="contact-info">
                    <h3 class="detail-section-title mb-4"><i class="fas fa-info-circle me-2"></i>Contact Info</h3>

                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h5>Email</h5>
                            <p>info@gtr-sport.com</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fas fa-globe"></i></div>
                        <div>
                            <h5>Website</h5>
                            <p>www.gtr-sport.com</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fas fa-clock"></i></div>
                        <div>
                            <h5>Response Time</h5>
                            <p>Within 24 hours</p>
                        </div>
                    </div>

                    <div class="contact-social mt-4">
                        <h5 class="mb-3">Follow Us</h5>
                        <div class="social-links">
                            <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
