@extends('layouts.app')

@section('title', 'GT-R Gallery')

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <h1 class="page-title">GT-R Gallery</h1>
        <p class="page-subtitle">Visual collection of the Nissan GT-R series</p>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <!-- Filter by Model -->
        <div class="filter-bar mb-4">
            <form method="GET" action="{{ route('gallery.index') }}" class="d-flex gap-3 align-items-end flex-wrap">
                <div>
                    <label class="filter-label">Filter by Model</label>
                    <select name="model_id" class="form-select filter-input" onchange="this.form.submit()">
                        <option value="">All Models</option>
                        @foreach($models as $model)
                            <option value="{{ $model->id }}" {{ $modelId == $model->id ? 'selected' : '' }}>{{ $model->name }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>

        @if($images->count())
        <div class="gallery-grid">
            @foreach($images as $image)
            <div class="gallery-grid-item" data-aos="fade-up">
                <a href="{{ $image->image_url }}" class="gallery-link" data-lightbox="gallery">
                    <img src="{{ $image->image_url }}" alt="{{ $image->caption ?? $image->gtrModel->name }}" loading="lazy"
                         onerror="this.src='https://via.placeholder.com/600x400/1a1a1a/ff0000?text=GT-R'">
                    <div class="gallery-overlay">
                        <div class="gallery-overlay-content">
                            <span class="gallery-model-name">{{ $image->gtrModel->name }}</span>
                            @if($image->caption)
                                <span class="gallery-caption-text">{{ $image->caption }}</span>
                            @endif
                            <i class="fas fa-expand mt-2"></i>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $images->withQueryString()->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-images fa-4x mb-3 text-muted"></i>
            <h3 class="text-white">No Gallery Images Found</h3>
            <p class="text-white-50">Upload gallery images through the admin dashboard.</p>
            @auth
                @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.gtr.index') }}" class="btn-gtr-primary">
                    <i class="fas fa-plus me-1"></i> Go to Admin
                </a>
                @endif
            @endauth
        </div>
        @endif
    </div>
</section>

<!-- Lightbox Modal -->
<div class="modal fade" id="lightboxModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-3" data-bs-dismiss="modal"></button>
            <img id="lightboxImage" src="" class="img-fluid" alt="Gallery Image">
        </div>
    </div>
</div>
@endsection
