@extends('layouts.app')

@section('title', 'GT-R Models')

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <h1 class="page-title">GT-R Models</h1>
        <p class="page-subtitle">Explore the complete lineup of Nissan GT-R vehicles</p>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <!-- Search & Filter -->
        <div class="filter-bar">
            <form method="GET" action="{{ route('gtr.index') }}" class="filter-form">
                <div class="row g-3 align-items-end">
                    <div class="col-lg-3 col-md-6">
                        <label class="filter-label">Search</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" name="search" class="form-control filter-input" placeholder="Search GT-R..." value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <label class="filter-label">Generation</label>
                        <select name="generation" class="form-select filter-input">
                            <option value="">All Generations</option>
                            @foreach($generations as $gen)
                                <option value="{{ $gen }}" {{ request('generation') == $gen ? 'selected' : '' }}>{{ $gen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <label class="filter-label">Sort By</label>
                        <select name="sort" class="form-select filter-input">
                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                            <option value="horsepower" {{ request('sort') == 'horsepower' ? 'selected' : '' }}>Horsepower</option>
                            <option value="year_start" {{ request('sort') == 'year_start' ? 'selected' : '' }}>Year</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <label class="filter-label">Direction</label>
                        <select name="direction" class="form-select filter-input">
                            <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                            <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Descending</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn-gtr-primary flex-grow-1">
                                <i class="fas fa-filter me-1"></i> Filter
                            </button>
                            <a href="{{ route('gtr.index') }}" class="btn-gtr-outline">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Results -->
        <div class="results-info mb-4">
            <p class="text-white-50">Showing {{ $models->count() }} of {{ $models->total() }} models</p>
        </div>

        @if($models->count())
        <div class="row g-4">
            @foreach($models as $model)
            <div class="col-lg-4 col-md-6">
                <x-gtr-card :model="$model" />
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $models->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-car fa-4x mb-3 text-muted"></i>
            <h3 class="text-white">No GT-R Models Found</h3>
            <p class="text-white-50">Try adjusting your search criteria or filters.</p>
            <a href="{{ route('gtr.index') }}" class="btn-gtr-primary">Clear Filters</a>
        </div>
        @endif
    </div>
</section>
@endsection
