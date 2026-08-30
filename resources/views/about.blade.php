@extends('layouts.app')

@section('title', 'About GT-R Sport')

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <h1 class="page-title">About GT-R Sport</h1>
        <p class="page-subtitle">The story behind the legend</p>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <!-- About Intro -->
        <div class="about-intro mb-5">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="section-title text-start">Our Mission</h2>
                    <p class="about-text">
                        GT-R Sport is a premium automotive website dedicated to preserving and celebrating the legacy of the Nissan GT-R series. Our mission is to create a comprehensive, database-driven resource that showcases every generation, variant, and specification of the world's most iconic sports car.
                    </p>
                    <p class="about-text">
                        From the original R32 "Godzilla" that dominated touring car championships, to the R35 NISMO that holds Nurburgring records, the GT-R represents the pinnacle of Japanese automotive engineering. We believe this legacy deserves a platform that matches its prestige.
                    </p>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="about-logo">
                        <span class="brand-gtr" style="font-size:3rem;">GT-R</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- GT-R Philosophy -->
        <div class="row g-4 mb-5">
            <div class="col-lg-4 col-md-6">
                <div class="about-card">
                    <div class="about-card-icon"><i class="fas fa-bolt"></i></div>
                    <h4>Performance Without Compromise</h4>
                    <p>The GT-R has always been about delivering supercar performance at a fraction of the price. Every generation pushes boundaries further, from the RB26DETT's legendary reliability to the VR38DETT's hand-built precision.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="about-card">
                    <div class="about-card-icon"><i class="fas fa-cogs"></i></div>
                    <h4>Engineering Innovation</h4>
                    <p>ATTESA E-TS all-wheel drive, independent rear transaxle, multi-mode display — the GT-R has introduced technologies that were ahead of their time, often trickling down to mainstream vehicles.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="about-card">
                    <div class="about-card-icon"><i class="fas fa-flag-checkered"></i></div>
                    <h4>Racing Heritage</h4>
                    <p>From Group A touring car racing to the Nurburgring, the GT-R's competition pedigree is unparalleled. NISMO continues to develop racing variants that push the limits of production car performance.</p>
                </div>
            </div>
        </div>

        <!-- Technical Heritage -->
        <div class="about-heritage">
            <h2 class="section-title">Technical Heritage</h2>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="heritage-card">
                        <h4><i class="fas fa-engine me-2"></i>RB26DETT (1989-2002)</h4>
                        <p>The legendary 2.6L twin-turbo inline-six that powered the R32, R33, and R34 Skyline GT-Rs. Known for its incredible tuning potential and reliability, the RB26DETT could produce well over 1,000 hp in modified form. Its distinctive exhaust note and smooth power delivery made it one of the most revered engines in automotive history.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="heritage-card">
                        <h4><i class="fas fa-engine me-2"></i>VR38DETT (2007-2025)</h4>
                        <p>The 3.8L twin-turbo V6 that powers the R35 GT-R. Hand-assembled by Takumi master craftsmen, each engine is signed with its builder's nameplate. The VR38DETT combines cutting-edge technology with traditional Japanese craftsmanship, producing between 480 and 600 hp depending on the variant.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ATTESA System -->
        <div class="mt-5">
            <h2 class="section-title">ATTESA E-TS</h2>
            <p class="about-text text-center mx-auto" style="max-width:800px;">
                The ATTESA E-TS (Advanced Total Traction Engineering System for All-Electronic Torque Split) is the all-wheel-drive system that has been a cornerstone of the GT-R's performance since the R32. It distributes torque between the front and rear axles electronically, optimizing traction in all conditions. In GT-R mode, the system provides a more rear-biased power delivery for sportier handling.
            </p>
        </div>
    </div>
</section>
@endsection
