@extends('layouts.app')

@section('title', 'Edit Review')

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <h1 class="page-title">Edit Review</h1>
        <p class="page-subtitle">Update your review for {{ $review->gtrModel->name }}</p>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="contact-form-card">
                    <form action="{{ route('reviews.update', $review) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="gtr_model_id" value="{{ $review->gtr_model_id }}">

                        <div class="mb-3">
                            <label class="filter-label">Model</label>
                            <input type="text" class="form-control filter-input" value="{{ $review->gtrModel->name }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="filter-label">Rating</label>
                            <div class="rating-input">
                                @for($i = 1; $i <= 5; $i++)
                                <label class="rating-star">
                                    <input type="radio" name="rating" value="{{ $i }}" {{ old('rating', $review->rating) == $i ? 'checked' : '' }} required>
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
                            <textarea name="comment" class="form-control filter-input" rows="4" required>{{ old('comment', $review->comment) }}</textarea>
                            @error('comment')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn-gtr-primary flex-grow-1">
                                <i class="fas fa-save me-1"></i> Update Review
                            </button>
                            <a href="{{ route('reviews.index') }}" class="btn-gtr-outline flex-grow-1 text-center">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
