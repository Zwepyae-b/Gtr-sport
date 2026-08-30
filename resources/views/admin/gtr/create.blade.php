@extends('layouts.app')

@section('title', 'Admin - Add GT-R Model')

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <h1 class="page-title"><i class="fas fa-plus me-2"></i>Add New GT-R Model</h1>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form-card">
                    <form action="{{ route('admin.gtr.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <h4 class="detail-section-title mb-4">Basic Information</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="filter-label">Model Name *</label>
                                <input type="text" name="name" class="form-control filter-input" value="{{ old('name') }}" required placeholder="e.g. Nissan GT-R R35">
                                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="filter-label">Generation *</label>
                                <input type="text" name="generation" class="form-control filter-input" value="{{ old('generation') }}" required placeholder="e.g. R35">
                                @error('generation') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">Year Start *</label>
                                <input type="number" name="year_start" class="form-control filter-input" value="{{ old('year_start') }}" required min="1960" max="2030">
                                @error('year_start') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">Year End</label>
                                <input type="number" name="year_end" class="form-control filter-input" value="{{ old('year_end') }}" min="1960" max="2030" placeholder="Present">
                                @error('year_end') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">Status *</label>
                                <select name="status" class="form-select filter-input" required>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">Main Image</label>
                                <input type="file" name="main_image" class="form-control filter-input" accept="image/*">
                                @error('main_image') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <h4 class="detail-section-title mb-4">Performance</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="filter-label">Engine *</label>
                                <input type="text" name="engine" class="form-control filter-input" value="{{ old('engine') }}" required placeholder="e.g. VR38DETT">
                                @error('engine') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="filter-label">Displacement *</label>
                                <input type="text" name="displacement" class="form-control filter-input" value="{{ old('displacement') }}" required placeholder="e.g. 3.8L Twin-Turbo V6">
                                @error('displacement') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="filter-label">Horsepower *</label>
                                <input type="number" name="horsepower" class="form-control filter-input" value="{{ old('horsepower') }}" required min="50" max="2000">
                                @error('horsepower') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="filter-label">Torque *</label>
                                <input type="text" name="torque" class="form-control filter-input" value="{{ old('torque') }}" required placeholder="e.g. 467 lb-ft (633 Nm)">
                                @error('torque') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="filter-label">Transmission *</label>
                                <input type="text" name="transmission" class="form-control filter-input" value="{{ old('transmission') }}" required placeholder="e.g. 6-speed dual-clutch">
                                @error('transmission') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="filter-label">Drivetrain *</label>
                                <input type="text" name="drivetrain" class="form-control filter-input" value="{{ old('drivetrain') }}" required placeholder="e.g. ATTESA E-TS AWD">
                                @error('drivetrain') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">0-100 km/h</label>
                                <input type="text" name="acceleration" class="form-control filter-input" value="{{ old('acceleration') }}" placeholder="e.g. 2.5 seconds">
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">Top Speed</label>
                                <input type="text" name="top_speed" class="form-control filter-input" value="{{ old('top_speed') }}" placeholder="e.g. 315 km/h">
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">Weight</label>
                                <input type="text" name="weight" class="form-control filter-input" value="{{ old('weight') }}" placeholder="e.g. 1,740 kg">
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">Fuel Type</label>
                                <input type="text" name="fuel_type" class="form-control filter-input" value="{{ old('fuel_type', 'Gasoline') }}">
                            </div>
                        </div>

                        <h4 class="detail-section-title mb-4">Additional Info</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="filter-label">Price</label>
                                <input type="text" name="price" class="form-control filter-input" value="{{ old('price') }}" placeholder="e.g. $113,540 (MSRP)">
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">&nbsp;</label>
                                <div class="form-check mt-2">
                                    <input type="checkbox" name="is_nismo" class="form-check-input" value="1" {{ old('is_nismo') ? 'checked' : '' }}>
                                    <label class="form-check-label text-white">NISMO Model</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">&nbsp;</label>
                                <div class="form-check mt-2">
                                    <input type="checkbox" name="is_featured" class="form-check-input" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                    <label class="form-check-label text-white">Featured</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="filter-label">Description</label>
                                <textarea name="description" class="form-control filter-input" rows="5" placeholder="Detailed description of this GT-R model...">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn-gtr-primary flex-grow-1">
                                <i class="fas fa-save me-1"></i> Create GT-R Model
                            </button>
                            <a href="{{ route('admin.gtr.index') }}" class="btn-gtr-outline flex-grow-1 text-center">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
