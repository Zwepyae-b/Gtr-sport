@extends('layouts.app')

@section('title', 'Admin - GT-R Models')

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title"><i class="fas fa-car me-2"></i>Manage GT-R Models</h1>
                <p class="page-subtitle">{{ $models->total() }} total models</p>
            </div>
            <a href="{{ route('admin.gtr.create') }}" class="btn-gtr-primary">
                <i class="fas fa-plus me-1"></i> Add New GT-R
            </a>
        </div>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <!-- Search -->
        <div class="filter-bar mb-4">
            <form method="GET" class="d-flex gap-3">
                <div class="flex-grow-1">
                    <input type="text" name="search" class="form-control filter-input" placeholder="Search models..." value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn-gtr-primary"><i class="fas fa-search"></i></button>
            </form>
        </div>

        @if($models->count())
        <div class="table-responsive">
            <table class="table table-dark table-hover gtr-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Generation</th>
                        <th>Years</th>
                        <th>Horsepower</th>
                        <th>Engine</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($models as $model)
                    <tr>
                        <td>
                            <img src="{{ $model->main_image_url }}" alt="{{ $model->name }}" class="table-image"
                                 onerror="this.src='https://via.placeholder.com/80x50/1a1a1a/ff0000?text=GT-R'">
                        </td>
                        <td class="text-white fw-bold">{{ $model->name }}</td>
                        <td><span class="badge bg-secondary">{{ $model->generation }}</span></td>
                        <td>{{ $model->year_start }}@if($model->year_end) - {{ $model->year_end }}@endif</td>
                        <td>{{ $model->horsepower }} HP</td>
                        <td>{{ $model->engine }}</td>
                        <td><span class="badge {{ $model->status === 'active' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($model->status) }}</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.gtr.edit', $model) }}" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.gtr.destroy', $model) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this GT-R model?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $models->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-car fa-4x mb-3 text-muted"></i>
            <h3 class="text-white">No GT-R Models</h3>
            <a href="{{ route('admin.gtr.create') }}" class="btn-gtr-primary">
                <i class="fas fa-plus me-1"></i> Add First GT-R
            </a>
        </div>
        @endif
    </div>
</section>
@endsection
