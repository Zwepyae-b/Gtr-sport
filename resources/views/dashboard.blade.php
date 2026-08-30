@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <h1 class="page-title"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h1>
        <p class="page-subtitle">Welcome back, {{ auth()->user()->name }}!</p>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('gtr.index') }}" class="admin-action-card">
                    <i class="fas fa-car"></i>
                    <h5>Browse GT-R Models</h5>
                    <p>Explore the complete GT-R lineup with detailed specifications.</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('favorites.index') }}" class="admin-action-card">
                    <i class="fas fa-heart"></i>
                    <h5>My Favorites</h5>
                    <p>View your favorite GT-R models.</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('reviews.index') }}" class="admin-action-card">
                    <i class="fas fa-comments"></i>
                    <h5>GT-R Reviews</h5>
                    <p>Read and write reviews for GT-R models.</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('gtr.compare') }}" class="admin-action-card">
                    <i class="fas fa-balance-scale"></i>
                    <h5>Compare Models</h5>
                    <p>Side-by-side comparison of GT-R specifications.</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('gtr.history') }}" class="admin-action-card">
                    <i class="fas fa-history"></i>
                    <h5>GT-R History</h5>
                    <p>The evolution of the legendary GT-R series.</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('profile.edit') }}" class="admin-action-card">
                    <i class="fas fa-cog"></i>
                    <h5>Profile Settings</h5>
                    <p>Manage your account settings and preferences.</p>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
