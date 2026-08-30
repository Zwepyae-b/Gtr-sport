@extends('layouts.app')

@section('title', '404 - Page Not Found')

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <div class="error-page text-center">
            <div class="error-code">404</div>
            <h1 class="error-title">Page Not Found</h1>
            <p class="error-text">The page you are looking for does not exist or has been moved.</p>
            <div class="error-actions mt-4">
                <a href="{{ route('home') }}" class="btn-gtr-primary">
                    <i class="fas fa-home me-1"></i> Go Home
                </a>
                <a href="{{ route('gtr.index') }}" class="btn-gtr-outline ms-3">
                    <i class="fas fa-car me-1"></i> Browse GT-R Models
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
