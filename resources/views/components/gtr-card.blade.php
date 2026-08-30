@props(['model'])

<div class="gtr-card" data-aos="fade-up">
    <div class="gtr-card-image">
        <img src="{{ $model->main_image_url }}" alt="{{ $model->name }}" loading="lazy"
             onerror="this.src='https://via.placeholder.com/800x500/1a1a1a/ff0000?text={{ urlencode($model->name) }}'">
        @if($model->is_nismo)
            <span class="badge-nismo">NISMO</span>
        @endif
        @if($model->is_featured)
            <span class="badge-featured"><i class="fas fa-star"></i> Featured</span>
        @endif
        <div class="gtr-card-overlay">
            <a href="{{ route('gtr.show', $model->slug) }}" class="btn-view-details">
                <i class="fas fa-eye"></i> View Details
            </a>
        </div>
    </div>
    <div class="gtr-card-body">
        <div class="gtr-card-header">
            <h5 class="gtr-card-title">{{ $model->name }}</h5>
            <span class="gtr-card-generation">{{ $model->generation }}</span>
        </div>
        <div class="gtr-card-years">
            {{ $model->year_start }}@if($model->year_end) - {{ $model->year_end }}@else - Present @endif
        </div>
        <div class="gtr-card-specs">
            <div class="spec-item">
                <span class="spec-label">Engine</span>
                <span class="spec-value">{{ $model->engine }}</span>
            </div>
            <div class="spec-item">
                <span class="spec-label">Power</span>
                <span class="spec-value">{{ $model->horsepower }} HP</span>
            </div>
            <div class="spec-item">
                <span class="spec-label">0-100</span>
                <span class="spec-value">{{ $model->acceleration ?? 'N/A' }}</span>
            </div>
        </div>
        @if($model->average_rating)
        <div class="gtr-card-rating">
            @for($i = 1; $i <= 5; $i++)
                <i class="fas fa-star {{ $i <= $model->average_rating ? 'text-warning' : 'text-secondary' }}"></i>
            @endfor
            <span class="rating-text">{{ $model->average_rating }}</span>
        </div>
        @endif
    </div>
</div>
