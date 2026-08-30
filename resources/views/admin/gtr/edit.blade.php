@extends('layouts.app')

@section('title', 'Admin - Edit ' . $gtrModel->name)

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <h1 class="page-title"><i class="fas fa-edit me-2"></i>Edit {{ $gtrModel->name }}</h1>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Current Image -->
                @if($gtrModel->main_image)
                <div class="detail-sidebar-card mb-4">
                    <h4 class="sidebar-card-title">Current Main Image</h4>
                    <img src="{{ $gtrModel->main_image_url }}" alt="{{ $gtrModel->name }}" class="img-fluid rounded">
                </div>
                @endif

                <div class="contact-form-card mb-4">
                    <form action="{{ route('admin.gtr.update', $gtrModel) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <h4 class="detail-section-title mb-4">Basic Information</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="filter-label">Model Name *</label>
                                <input type="text" name="name" class="form-control filter-input" value="{{ old('name', $gtrModel->name) }}" required>
                                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="filter-label">Generation *</label>
                                <input type="text" name="generation" class="form-control filter-input" value="{{ old('generation', $gtrModel->generation) }}" required>
                                @error('generation') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">Year Start *</label>
                                <input type="number" name="year_start" class="form-control filter-input" value="{{ old('year_start', $gtrModel->year_start) }}" required min="1960" max="2030">
                                @error('year_start') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">Year End</label>
                                <input type="number" name="year_end" class="form-control filter-input" value="{{ old('year_end', $gtrModel->year_end) }}" min="1960" max="2030">
                                @error('year_end') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">Status *</label>
                                <select name="status" class="form-select filter-input" required>
                                    <option value="active" {{ old('status', $gtrModel->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status', $gtrModel->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">Replace Image</label>
                                <input type="file" name="main_image" class="form-control filter-input" accept="image/*">
                                @error('main_image') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <h4 class="detail-section-title mb-4">Performance</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="filter-label">Engine *</label>
                                <input type="text" name="engine" class="form-control filter-input" value="{{ old('engine', $gtrModel->engine) }}" required>
                                @error('engine') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="filter-label">Displacement *</label>
                                <input type="text" name="displacement" class="form-control filter-input" value="{{ old('displacement', $gtrModel->displacement) }}" required>
                                @error('displacement') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="filter-label">Horsepower *</label>
                                <input type="number" name="horsepower" class="form-control filter-input" value="{{ old('horsepower', $gtrModel->horsepower) }}" required min="50" max="2000">
                                @error('horsepower') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="filter-label">Torque *</label>
                                <input type="text" name="torque" class="form-control filter-input" value="{{ old('torque', $gtrModel->torque) }}" required>
                                @error('torque') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="filter-label">Transmission *</label>
                                <input type="text" name="transmission" class="form-control filter-input" value="{{ old('transmission', $gtrModel->transmission) }}" required>
                                @error('transmission') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="filter-label">Drivetrain *</label>
                                <input type="text" name="drivetrain" class="form-control filter-input" value="{{ old('drivetrain', $gtrModel->drivetrain) }}" required>
                                @error('drivetrain') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">0-100 km/h</label>
                                <input type="text" name="acceleration" class="form-control filter-input" value="{{ old('acceleration', $gtrModel->acceleration) }}">
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">Top Speed</label>
                                <input type="text" name="top_speed" class="form-control filter-input" value="{{ old('top_speed', $gtrModel->top_speed) }}">
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">Weight</label>
                                <input type="text" name="weight" class="form-control filter-input" value="{{ old('weight', $gtrModel->weight) }}">
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">Fuel Type</label>
                                <input type="text" name="fuel_type" class="form-control filter-input" value="{{ old('fuel_type', $gtrModel->fuel_type) }}">
                            </div>
                        </div>

                        <h4 class="detail-section-title mb-4">Additional Info</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="filter-label">Price</label>
                                <input type="text" name="price" class="form-control filter-input" value="{{ old('price', $gtrModel->price) }}">
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">&nbsp;</label>
                                <div class="form-check mt-2">
                                    <input type="checkbox" name="is_nismo" class="form-check-input" value="1" {{ old('is_nismo', $gtrModel->is_nismo) ? 'checked' : '' }}>
                                    <label class="form-check-label text-white">NISMO Model</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="filter-label">&nbsp;</label>
                                <div class="form-check mt-2">
                                    <input type="checkbox" name="is_featured" class="form-check-input" value="1" {{ old('is_featured', $gtrModel->is_featured) ? 'checked' : '' }}>
                                    <label class="form-check-label text-white">Featured</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="filter-label">Description</label>
                                <textarea name="description" class="form-control filter-input" rows="5">{{ old('description', $gtrModel->description) }}</textarea>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn-gtr-primary flex-grow-1">
                                <i class="fas fa-save me-1"></i> Update GT-R Model
                            </button>
                            <a href="{{ route('admin.gtr.index') }}" class="btn-gtr-outline flex-grow-1 text-center">Cancel</a>
                        </div>
                    </form>
                </div>

                <!-- Gallery Management -->
                <div class="contact-form-card mb-4">
                    <h4 class="detail-section-title mb-4"><i class="fas fa-images me-2"></i>Gallery Management</h4>

                    <!-- Upload New Images -->
                    <form action="{{ route('admin.gtr.gallery.upload', $gtrModel) }}" method="POST" enctype="multipart/form-data" class="mb-4">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="filter-label">Upload Gallery Images (Max 5MB each)</label>
                                <input type="file" name="images[]" class="form-control filter-input" multiple accept="image/*" required>
                                @error('images') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="submit" class="btn-gtr-primary w-100">
                                    <i class="fas fa-upload me-1"></i> Upload
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Current Gallery -->
                    @if($gtrModel->galleries->count())
                    <div class="row g-3">
                        @foreach($gtrModel->galleries as $gallery)
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="gallery-admin-item">
                                <img src="{{ $gallery->image_url }}" alt="{{ $gallery->caption }}" class="img-fluid rounded"
                                     onerror="this.src='https://via.placeholder.com/200x150/1a1a1a/ff0000?text=GT-R'">
                                @if($gallery->caption)
                                <small class="text-white-50 d-block mt-1">{{ $gallery->caption }}</small>
                                @endif
                                <form action="{{ route('admin.gtr.gallery.destroy', $gallery) }}" method="POST" class="mt-1" onsubmit="return confirm('Delete this image?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger w-100"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-white-50">No gallery images uploaded yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
