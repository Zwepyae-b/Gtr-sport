@extends('layouts.app')

@section('title', 'NISMO - Nissan Motorsport')

@section('content')
<section class="gtr-page-header gtr-page-header-nismo">
    <div class="container">
        <div class="nismo-header-content">
            <span class="section-badge section-badge-nismo">NISMO</span>
            <h1 class="page-title">Nissan Motorsport International</h1>
            <p class="page-subtitle">Where racing heritage meets road-going performance</p>
        </div>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <!-- NISMO Intro -->
        <div class="nismo-intro mb-5">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="section-title text-start">The Spirit of NISMO</h2>
                    <p class="nismo-text">
                        NISMO (Nissan Motorsport International) is Nissan's dedicated motorsport division, responsible for developing the highest-performance variants of Nissan vehicles. Born on the racetrack, NISMO brings competition-proven technology to road cars, creating machines that deliver uncompromising performance.
                    </p>
                    <p class="nismo-text">
                        Every NISMO vehicle undergoes rigorous testing at circuits around the world, including the Nurburgring Nordschleife, where the GT-R NISMO holds an astonishing lap record of 7:08.679 for a production sedan. The attention to detail, hand-built engines, and race-derived components make NISMO the pinnacle of Nissan performance.
                    </p>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="nismo-logo-large">
                        <i class="fas fa-flag-checkered"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- NISMO Features -->
        <div class="row g-4 mb-5">
            <div class="col-lg-4 col-md-6">
                <div class="nismo-feature-card">
                    <div class="nismo-feature-icon"><i class="fas fa-engine"></i></div>
                    <h4>Hand-Built Engines</h4>
                    <p>Each NISMO VR38DETT engine is hand-assembled by a single Takumi master craftsman, signed with a personal nameplate.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="nismo-feature-card">
                    <div class="nismo-feature-icon"><i class="fas fa-wind"></i></div>
                    <h4>Aerodynamic Mastery</h4>
                    <p>Carbon fiber body components, functional vents, and rear diffusers generate significant downforce without compromising aerodynamics.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="nismo-feature-card">
                    <div class="nismo-feature-icon"><i class="fas fa-gauge-high"></i></div>
                    <h4>Race-Derived Suspension</h4>
                    <p>Bilstein DampTronic shocks, recalibrated ATTESA E-TS, and wider track deliver unmatched cornering capabilities.</p>
                </div>
            </div>
        </div>

        <!-- NISMO Models -->
        <div class="section-header">
            <h2 class="section-title">NISMO GT-R Models</h2>
            <p class="section-subtitle">The ultimate expression of GT-R performance</p>
        </div>

        @if($nismoModels->count())
        <div class="row g-4">
            @foreach($nismoModels as $model)
            <div class="col-lg-4 col-md-6">
                <x-gtr-card :model="$model" />
            </div>
            @endforeach
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-flag-checkered fa-4x mb-3 text-muted"></i>
            <h3 class="text-white">No NISMO Models Found</h3>
            <p class="text-white-50">NISMO models will appear here once they are added to the database.</p>
        </div>
        @endif
    </div>
</section>
@endsection
