@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<section class="gtr-page-header">
    <div class="container">
        <h1 class="page-title"><i class="fas fa-user-cog me-2"></i>Profile Settings</h1>
        <p class="page-subtitle">Manage your account settings</p>
    </div>
</section>

<section class="gtr-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @include('profile.partials.update-profile-information-form')

                <div class="mt-4">
                    @include('profile.partials.update-password-form')
                </div>

                <div class="mt-4">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
