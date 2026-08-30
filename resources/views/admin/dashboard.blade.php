@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <h1 class="page-title"><i class="fas fa-shield-alt me-2"></i>Admin Dashboard</h1>
        <p class="page-subtitle">Manage your GT-R Sport website</p>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <!-- Stats -->
        <div class="row g-4 mb-5">
            <div class="col-lg-3 col-md-6">
                <div class="admin-stat-card">
                    <div class="admin-stat-icon"><i class="fas fa-car"></i></div>
                    <div class="admin-stat-number">{{ $stats['total_models'] }}</div>
                    <div class="admin-stat-label">GT-R Models</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="admin-stat-card">
                    <div class="admin-stat-icon"><i class="fas fa-users"></i></div>
                    <div class="admin-stat-number">{{ $stats['total_users'] }}</div>
                    <div class="admin-stat-label">Users</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="admin-stat-card">
                    <div class="admin-stat-icon"><i class="fas fa-comments"></i></div>
                    <div class="admin-stat-number">{{ $stats['total_reviews'] }}</div>
                    <div class="admin-stat-label">Reviews</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="admin-stat-card">
                    <div class="admin-stat-icon"><i class="fas fa-heart"></i></div>
                    <div class="admin-stat-number">{{ $stats['total_favorites'] }}</div>
                    <div class="admin-stat-label">Favorites</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row g-4 mb-5">
            <div class="col-lg-4">
                <a href="{{ route('admin.gtr.index') }}" class="admin-action-card">
                    <i class="fas fa-car"></i>
                    <h5>Manage GT-R Models</h5>
                    <p>Add, edit, or remove GT-R models from the database.</p>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.reviews.index') }}" class="admin-action-card">
                    <i class="fas fa-comments"></i>
                    <h5>Manage Reviews</h5>
                    <p>Review and moderate user reviews. {{ $stats['pending_reviews'] }} pending.</p>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.users.index') }}" class="admin-action-card">
                    <i class="fas fa-users"></i>
                    <h5>Manage Users</h5>
                    <p>View and manage registered users and admin privileges.</p>
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="detail-sidebar-card">
                    <h4 class="sidebar-card-title"><i class="fas fa-comments me-2"></i>Recent Reviews</h4>
                    @if($recentReviews->count())
                        @foreach($recentReviews as $review)
                        <div class="admin-review-item">
                            <div class="d-flex justify-content-between">
                                <span class="text-white">{{ $review->user->name }}</span>
                                <span class="badge {{ $review->status === 'approved' ? 'bg-success' : ($review->status === 'pending' ? 'bg-warning' : 'bg-danger') }}">{{ $review->status }}</span>
                            </div>
                            <small class="text-white-50">{{ $review->gtrModel->name }} - {{ $review->created_at->diffForHumans() }}</small>
                        </div>
                        @endforeach
                    @else
                        <p class="text-white-50">No reviews yet.</p>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="detail-sidebar-card">
                    <h4 class="sidebar-card-title"><i class="fas fa-users me-2"></i>Recent Users</h4>
                    @if($recentUsers->count())
                        @foreach($recentUsers as $user)
                        <div class="admin-review-item">
                            <div class="d-flex justify-content-between">
                                <span class="text-white">{{ $user->name }}</span>
                                @if($user->is_admin)
                                <span class="badge bg-danger">Admin</span>
                                @endif
                            </div>
                            <small class="text-white-50">{{ $user->email }} - {{ $user->created_at->diffForHumans() }}</small>
                        </div>
                        @endforeach
                    @else
                        <p class="text-white-50">No users yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
