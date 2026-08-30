@extends('layouts.app')

@section('title', $gtrModel->name)

@section('content')
<section class="gtr-detail-header">
    <div class="detail-header-overlay"></div>
    <div class="container detail-header-content">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="detail-badge">{{ $gtrModel->generation }}</span>
                <h1 class="detail-title">{{ $gtrModel->name }}</h1>
                <p class="detail-years">
                    {{ $gtrModel->year_start }}@if($gtrModel->year_end) - {{ $gtrModel->year_end }}@else - Present @endif
                </p>
                <div class="detail-quick-specs">
                    <div class="quick-spec">
                        <span class="qs-value">{{ $gtrModel->horsepower }}</span>
                        <span class="qs-label">HP</span>
                    </div>
                    <div class="quick-spec">
                        <span class="qs-value">{{ $gtrModel->acceleration ? explode(' ', $gtrModel->acceleration)[0] : 'N/A' }}</span>
                        <span class="qs-label">0-100 km/h</span>
                    </div>
                    <div class="quick-spec">
                        <span class="qs-value">{{ $gtrModel->top_speed ? explode(' ', $gtrModel->top_speed)[0] : 'N/A' }}</span>
                        <span class="qs-label">km/h</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 text-lg-end mt-4 mt-lg-0">
                <div class="detail-actions">
                    @auth
                    <form action="{{ route('favorites.toggle', $gtrModel) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn {{ $isFavorited ? 'btn-gtr-favorited' : 'btn-gtr-favorite' }}">
                            <i class="fas fa-heart me-1"></i>
                            {{ $isFavorited ? 'Favorited' : 'Favorite' }}
                        </button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-gtr-favorite">
                        <i class="fas fa-heart me-1"></i> Login to Favorite
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <!-- Main Image -->
        <div class="detail-main-image mb-5">
            <img src="{{ $gtrModel->main_image_url }}" alt="{{ $gtrModel->name }}" class="img-fluid rounded"
                 onerror="this.src='https://via.placeholder.com/1200x600/1a1a1a/ff0000?text={{ urlencode($gtrModel->name) }}'">
        </div>

        <!-- Gallery -->
        @if($gtrModel->galleries->count())
        <div class="detail-gallery mb-5">
            <h3 class="detail-section-title"><i class="fas fa-images me-2"></i>Gallery</h3>
            <div class="row g-3">
                @foreach($gtrModel->galleries as $gallery)
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="{{ $gallery->image_url }}" class="gallery-item" data-lightbox="gallery">
                        <img src="{{ $gallery->image_url }}" alt="{{ $gallery->caption ?? $gtrModel->name }}" class="img-fluid rounded"
                             onerror="this.src='https://via.placeholder.com/400x300/1a1a1a/ff0000?text=GT-R'">
                        @if($gallery->caption)
                        <div class="gallery-caption">{{ $gallery->caption }}</div>
                        @endif
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="row g-5">
            <!-- Specifications -->
            <div class="col-lg-8">
                <h3 class="detail-section-title"><i class="fas fa-cogs me-2"></i>Specifications</h3>
                <div class="specs-grid">
                    <x-specification-card label="Engine" value="{{ $gtrModel->engine }}" icon="fas fa-cog" />
                    <x-specification-card label="Displacement" value="{{ $gtrModel->displacement }}" icon="fas fa-oil-can" />
                    <x-specification-card label="Horsepower" value="{{ $gtrModel->horsepower }} HP" icon="fas fa-bolt" />
                    <x-specification-card label="Torque" value="{{ $gtrModel->torque }}" icon="fas fa-sync-alt" />
                    <x-specification-card label="Transmission" value="{{ $gtrModel->transmission }}" icon="fas fa-gears" />
                    <x-specification-card label="Drivetrain" value="{{ $gtrModel->drivetrain }}" icon="fas fa-road" />
                    <x-specification-card label="0-100 km/h" value="{{ $gtrModel->acceleration ?? 'N/A' }}" icon="fas fa-stopwatch" />
                    <x-specification-card label="Top Speed" value="{{ $gtrModel->top_speed ?? 'N/A' }}" icon="fas fa-tachometer-alt" />
                    <x-specification-card label="Weight" value="{{ $gtrModel->weight ?? 'N/A' }}" icon="fas fa-weight-hanging" />
                    <x-specification-card label="Fuel Type" value="{{ $gtrModel->fuel_type }}" icon="fas fa-gas-pump" />
                    <x-specification-card label="Price" value="{{ $gtrModel->price ?? 'N/A' }}" icon="fas fa-tag" />
                </div>

                <!-- Description -->
                <div class="detail-description mt-5">
                    <h3 class="detail-section-title"><i class="fas fa-info-circle me-2"></i>About This GT-R</h3>
                    <p class="description-text">{{ $gtrModel->description }}</p>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Rating -->
                <div class="detail-sidebar-card">
                    <h4 class="sidebar-card-title">Rating</h4>
                    @if($gtrModel->average_rating)
                    <div class="text-center mb-3">
                        <div class="rating-big">{{ $gtrModel->average_rating }}</div>
                        <div class="rating-stars">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $gtrModel->average_rating ? 'text-warning' : 'text-secondary' }} fs-5"></i>
                            @endfor
                        </div>
                        <span class="text-white-50">{{ $gtrModel->approvedReviews->count() }} reviews</span>
                    </div>
                    @else
                    <p class="text-white-50 text-center">No reviews yet.</p>
                    @endif
                </div>

                <!-- Quick Info -->
                <div class="detail-sidebar-card">
                    <h4 class="sidebar-card-title">Quick Info</h4>
                    <ul class="sidebar-info-list">
                        <li><strong>Generation:</strong> {{ $gtrModel->generation }}</li>
                        <li><strong>Years:</strong> {{ $gtrModel->year_start }}@if($gtrModel->year_end) - {{ $gtrModel->year_end }}@else - Present @endif</li>
                        <li><strong>Status:</strong> <span class="badge {{ $gtrModel->status === 'active' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($gtrModel->status) }}</span></li>
                        @if($gtrModel->is_nismo)
                        <li><strong>Type:</strong> <span class="badge bg-danger">NISMO</span></li>
                        @endif
                    </ul>
                </div>

                @auth
                <!-- Write Review -->
                <div class="detail-sidebar-card">
                    <h4 class="sidebar-card-title">Write a Review</h4>
                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="gtr_model_id" value="{{ $gtrModel->id }}">
                        <div class="mb-3">
                            <label class="filter-label">Rating</label>
                            <div class="rating-input">
                                @for($i = 1; $i <= 5; $i++)
                                <label class="rating-star">
                                    <input type="radio" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }} required>
                                    <i class="fas fa-star"></i>
                                </label>
                                @endfor
                            </div>
                            @error('rating')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="filter-label">Comment</label>
                            <textarea name="comment" class="form-control filter-input" rows="3" placeholder="Share your thoughts..." required>{{ old('comment') }}</textarea>
                            @error('comment')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn-gtr-primary w-100">
                            <i class="fas fa-paper-plane me-1"></i> Submit Review
                        </button>
                    </form>
                </div>
                @else
                <div class="detail-sidebar-card text-center">
                    <a href="{{ route('login') }}" class="btn-gtr-primary">
                        <i class="fas fa-sign-in-alt me-1"></i> Login to Review
                    </a>
                </div>
                @endauth
            </div>
        </div>

        <!-- Reviews -->
        @if($gtrModel->approvedReviews->count())
        <div class="detail-reviews mt-5">
            <h3 class="detail-section-title"><i class="fas fa-comments me-2"></i>Reviews ({{ $gtrModel->approvedReviews->count() }})</h3>
            <div class="reviews-list">
                @foreach($gtrModel->approvedReviews as $review)
                <div class="review-item">
                    <div class="review-item-header">
                        <div>
                            <span class="review-author-name">{{ $review->user->name }}</span>
                            <div class="review-item-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-secondary' }} small"></i>
                                @endfor
                            </div>
                        </div>
                        <span class="review-item-date">{{ $review->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="review-item-text">{{ $review->comment }}</p>
                    @auth
                        @if($review->user_id === auth()->id())
                        <div class="review-actions">
                            <a href="{{ route('reviews.edit', $review) }}" class="btn btn-sm btn-outline-light"><i class="fas fa-edit me-1"></i>Edit</a>
                            <form action="{{ route('reviews.destroy', $review) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this review?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash me-1"></i>Delete</button>
                            </form>
                        </div>
                        @endif
                    @endauth
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Similar Models -->
        @if($similarModels->count())
        <div class="detail-similar mt-5">
            <h3 class="detail-section-title"><i class="fas fa-car me-2"></i>Similar GT-R Models</h3>
            <div class="row g-4">
                @foreach($similarModels as $model)
                <div class="col-lg-4 col-md-6">
                    <x-gtr-card :model="$model" />
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
