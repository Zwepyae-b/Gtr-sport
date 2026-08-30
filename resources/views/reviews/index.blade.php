@extends('layouts.app')

@section('title', 'GT-R Reviews')

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <h1 class="page-title">GT-R Reviews</h1>
        <p class="page-subtitle">Community reviews and ratings for GT-R models</p>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <!-- Filter by Model -->
        <div class="filter-bar mb-4">
            <form method="GET" action="{{ route('reviews.index') }}" class="d-flex gap-3 align-items-end flex-wrap">
                <div>
                    <label class="filter-label">Filter by Model</label>
                    <select name="model_id" class="form-select filter-input" onchange="this.form.submit()">
                        <option value="">All Models</option>
                        @foreach($models as $model)
                            <option value="{{ $model->id }}" {{ request('model_id') == $model->id ? 'selected' : '' }}>{{ $model->name }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>

        @if($reviews->count())
        <div class="reviews-list">
            @foreach($reviews as $review)
            <div class="review-item">
                <div class="review-item-header">
                    <div>
                        <span class="review-author-name">{{ $review->user->name }}</span>
                        <span class="review-model-badge">
                            <a href="{{ route('gtr.show', $review->gtrModel->slug) }}">{{ $review->gtrModel->name }}</a>
                        </span>
                        <div class="review-item-rating">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-secondary' }}"></i>
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

        <div class="d-flex justify-content-center mt-5">
            {{ $reviews->withQueryString()->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-comments fa-4x mb-3 text-muted"></i>
            <h3 class="text-white">No Reviews Yet</h3>
            <p class="text-white-50">Be the first to share your thoughts about a GT-R model.</p>
            @auth
            <a href="{{ route('gtr.index') }}" class="btn-gtr-primary">
                <i class="fas fa-car me-1"></i> Browse Models
            </a>
            @else
            <a href="{{ route('login') }}" class="btn-gtr-primary">
                <i class="fas fa-sign-in-alt me-1"></i> Login to Review
            </a>
            @endauth
        </div>
        @endif
    </div>
</section>
@endsection
