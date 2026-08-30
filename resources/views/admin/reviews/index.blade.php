@extends('layouts.app')

@section('title', 'Admin - Manage Reviews')

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <h1 class="page-title"><i class="fas fa-comments me-2"></i>Manage Reviews</h1>
        <p class="page-subtitle">{{ $reviews->total() }} total reviews</p>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <!-- Filter -->
        <div class="filter-bar mb-4">
            <form method="GET" class="d-flex gap-3">
                <select name="status" class="form-select filter-input" onchange="this.form.submit()">
                    <option value="">All Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </form>
        </div>

        @if($reviews->count())
        <div class="table-responsive">
            <table class="table table-dark table-hover gtr-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Model</th>
                        <th>Rating</th>
                        <th>Comment</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reviews as $review)
                    <tr>
                        <td class="text-white">{{ $review->user->name }}</td>
                        <td><a href="{{ route('gtr.show', $review->gtrModel->slug) }}" class="text-info">{{ $review->gtrModel->name }}</a></td>
                        <td>
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-secondary' }} small"></i>
                            @endfor
                        </td>
                        <td class="text-white-50">{{ \Str::limit($review->comment, 80) }}</td>
                        <td>
                            <span class="badge {{ $review->status === 'approved' ? 'bg-success' : ($review->status === 'pending' ? 'bg-warning' : 'bg-danger') }}">
                                {{ ucfirst($review->status) }}
                            </span>
                        </td>
                        <td class="text-white-50">{{ $review->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                @if($review->status !== 'approved')
                                <form action="{{ route('admin.reviews.approve', $review) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-success" title="Approve"><i class="fas fa-check"></i></button>
                                </form>
                                @endif
                                @if($review->status !== 'rejected')
                                <form action="{{ route('admin.reviews.reject', $review) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-warning" title="Reject"><i class="fas fa-times"></i></button>
                                </form>
                                @endif
                                <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Delete this review?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $reviews->withQueryString()->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-comments fa-4x mb-3 text-muted"></i>
            <h3 class="text-white">No Reviews Found</h3>
        </div>
        @endif
    </div>
</section>
@endsection
