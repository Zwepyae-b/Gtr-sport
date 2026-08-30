@extends('layouts.app')

@section('title', 'My Favorites')

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <h1 class="page-title">My Favorites</h1>
        <p class="page-subtitle">Your favorite GT-R models</p>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        @if($favorites->count())
        <div class="row g-4">
            @foreach($favorites as $favorite)
            <div class="col-lg-4 col-md-6">
                @if($favorite->gtrModel)
                <x-gtr-card :model="$favorite->gtrModel" />
                @endif
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $favorites->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-heart fa-4x mb-3 text-muted"></i>
            <h3 class="text-white">No Favorites Yet</h3>
            <p class="text-white-50">Start exploring GT-R models and click the heart icon to add them to your favorites.</p>
            <a href="{{ route('gtr.index') }}" class="btn-gtr-primary">
                <i class="fas fa-car me-1"></i> Browse Models
            </a>
        </div>
        @endif
    </div>
</section>
@endsection
