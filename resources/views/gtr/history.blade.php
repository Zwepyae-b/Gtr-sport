@extends('layouts.app')

@section('title', 'GT-R History')

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <h1 class="page-title">GT-R History</h1>
        <p class="page-subtitle">The evolution of the legendary Nissan GT-R through four generations</p>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <div class="history-intro text-center mb-5">
            <p class="history-intro-text">
                The Nissan GT-R story began in 1969 with the original Hakosuka Skyline GT-R. Over five decades, it has evolved from a touring car racer into one of the most respected performance cars in automotive history. Each generation brought innovations that pushed the boundaries of what was possible.
            </p>
        </div>

        <div class="history-timeline">
            @foreach($generations as $generation => $models)
            <div class="history-era" data-aos="fade-up">
                <div class="era-header">
                    <div class="era-badge">{{ $generation }}</div>
                    <div class="era-line"></div>
                </div>

                @foreach($models as $model)
                <div class="era-model-card">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="era-model-image">
                                <img src="{{ $model->main_image_url }}" alt="{{ $model->name }}" class="img-fluid rounded"
                                     onerror="this.src='https://via.placeholder.com/600x400/1a1a1a/ff0000?text={{ urlencode($model->name) }}'">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="era-model-info">
                                <h3 class="era-model-name">{{ $model->name }}</h3>
                                <span class="era-model-years">{{ $model->year_start }}@if($model->year_end) - {{ $model->year_end }}@else - Present @endif</span>
                                <p class="era-model-desc">{{ \Str::limit($model->description, 300) }}</p>
                                <div class="era-model-specs">
                                    <span><i class="fas fa-cog me-1"></i>{{ $model->engine }}</span>
                                    <span><i class="fas fa-bolt me-1"></i>{{ $model->horsepower }} HP</span>
                                    <span><i class="fas fa-stopwatch me-1"></i>{{ $model->acceleration ?? 'N/A' }}</span>
                                </div>
                                <a href="{{ route('gtr.show', $model->slug) }}" class="btn-gtr-outline-sm mt-3">
                                    Full Details <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
