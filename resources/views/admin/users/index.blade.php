@extends('layouts.app')

@section('title', 'Admin - Manage Users')

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <h1 class="page-title"><i class="fas fa-users me-2"></i>Manage Users</h1>
        <p class="page-subtitle">{{ $users->total() }} registered users</p>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <!-- Search -->
        <div class="filter-bar mb-4">
            <form method="GET" class="d-flex gap-3">
                <div class="flex-grow-1">
                    <input type="text" name="search" class="form-control filter-input" placeholder="Search users by name or email..." value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn-gtr-primary"><i class="fas fa-search"></i></button>
            </form>
        </div>

        @if($users->count())
        <div class="table-responsive">
            <table class="table table-dark table-hover gtr-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Reviews</th>
                        <th>Joined</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="text-white fw-bold">{{ $user->name }}</td>
                        <td class="text-white-50">{{ $user->email }}</td>
                        <td>
                            @if($user->is_admin)
                                <span class="badge bg-danger">Admin</span>
                            @else
                                <span class="badge bg-secondary">User</span>
                            @endif
                        </td>
                        <td>{{ $user->reviews_count }}</td>
                        <td class="text-white-50">{{ $user->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                @if($user->id !== auth()->id())
                                <form action="{{ route('admin.users.toggle-admin', $user) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $user->is_admin ? 'btn-outline-secondary' : 'btn-outline-warning' }}" title="{{ $user->is_admin ? 'Remove Admin' : 'Make Admin' }}">
                                        <i class="fas fa-{{ $user->is_admin ? 'user-minus' : 'user-shield' }}"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Delete this user? This action cannot be undone.')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                </form>
                                @else
                                <span class="text-white-50 small">Current user</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $users->withQueryString()->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-users fa-4x mb-3 text-muted"></i>
            <h3 class="text-white">No Users Found</h3>
        </div>
        @endif
    </div>
</section>
@endsection
