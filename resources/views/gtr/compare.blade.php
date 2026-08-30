@extends('layouts.app')

@section('title', 'Compare GT-R Models')

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <h1 class="page-title">Compare GT-R Models</h1>
        <p class="page-subtitle">Select up to 3 GT-R models to compare side by side</p>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <!-- Model Selection -->
        <div class="compare-selector mb-5">
            <form method="GET" action="{{ route('gtr.compare') }}" id="compareForm">
                <div class="row g-3">
                    @for($i = 0; $i < 3; $i++)
                    <div class="col-lg-4 col-md-6">
                        <div class="compare-select-card">
                            <label class="filter-label">Model {{ $i + 1 }}</label>
                            <select name="models[]" class="form-select filter-input compare-select">
                                <option value="">Select GT-R Model</option>
                                @foreach($allModels as $model)
                                    <option value="{{ $model->id }}" {{ in_array($model->id, request('models', [])) ? 'selected' : '' }}>
                                        {{ $model->name }} ({{ $model->year_start }}@if($model->year_end) - {{ $model->year_end }}@endif)
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endfor
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn-gtr-primary">
                            <i class="fas fa-balance-scale me-1"></i> Compare Selected
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Comparison Table -->
        @if($compareModels->count() >= 2)
        <div class="compare-table-wrapper">
            <table class="table compare-table">
                <thead>
                    <tr>
                        <th class="compare-label-col">Specification</th>
                        @foreach($compareModels as $model)
                        <th class="compare-model-col">
                            <div class="compare-model-header">
                                <img src="{{ $model->main_image_url }}" alt="{{ $model->name }}" class="compare-model-img"
                                     onerror="this.src='https://via.placeholder.com/300x200/1a1a1a/ff0000?text=GT-R'">
                                <h5>{{ $model->name }}</h5>
                                <span class="compare-model-years">{{ $model->year_start }}@if($model->year_end) - {{ $model->year_end }}@endif</span>
                            </div>
                        </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="compare-label"><i class="fas fa-cog me-2"></i>Engine</td>
                        @foreach($compareModels as $model)
                            <td>{{ $model->engine }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td class="compare-label"><i class="fas fa-oil-can me-2"></i>Displacement</td>
                        @foreach($compareModels as $model)
                            <td>{{ $model->displacement }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td class="compare-label"><i class="fas fa-bolt me-2"></i>Horsepower</td>
                        @foreach($compareModels as $model)
                            <td class="{{ $compareModels->max('horsepower') == $model->horsepower ? 'compare-best' : '' }}">{{ $model->horsepower }} HP</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td class="compare-label"><i class="fas fa-sync-alt me-2"></i>Torque</td>
                        @foreach($compareModels as $model)
                            <td>{{ $model->torque }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td class="compare-label"><i class="fas fa-stopwatch me-2"></i>0-100 km/h</td>
                        @foreach($compareModels as $model)
                            <td>{{ $model->acceleration ?? 'N/A' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td class="compare-label"><i class="fas fa-tachometer-alt me-2"></i>Top Speed</td>
                        @foreach($compareModels as $model)
                            <td>{{ $model->top_speed ?? 'N/A' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td class="compare-label"><i class="fas fa-gears me-2"></i>Transmission</td>
                        @foreach($compareModels as $model)
                            <td>{{ $model->transmission }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td class="compare-label"><i class="fas fa-road me-2"></i>Drivetrain</td>
                        @foreach($compareModels as $model)
                            <td>{{ $model->drivetrain }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td class="compare-label"><i class="fas fa-weight-hanging me-2"></i>Weight</td>
                        @foreach($compareModels as $model)
                            <td>{{ $model->weight ?? 'N/A' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td class="compare-label"><i class="fas fa-tag me-2"></i>Price</td>
                        @foreach($compareModels as $model)
                            <td>{{ $model->price ?? 'N/A' }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        @elseif($compareModels->count() == 1)
            <div class="empty-state text-center">
                <i class="fas fa-info-circle fa-3x mb-3 text-warning"></i>
                <h3 class="text-white">Select at least 2 models</h3>
                <p class="text-white-50">Choose two or more GT-R models from the dropdown above to compare.</p>
            </div>
        @else
            <div class="empty-state text-center">
                <i class="fas fa-balance-scale fa-4x mb-3 text-muted"></i>
                <h3 class="text-white">Compare GT-R Models</h3>
                <p class="text-white-50">Select two or three GT-R models from the dropdowns above to see a detailed comparison of their specifications.</p>
            </div>
        @endif
    </div>
</section>
@endsection
