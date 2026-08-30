@extends('layouts.guest')

@section('title', 'Verify Email')

@section('content')
<h3 class="text-center mb-4" style="font-family: var(--font-display); font-size: 1.5rem; color: var(--gtr-white);">
    <i class="fas fa-envelope-open me-2" style="color: var(--gtr-red);"></i>Verify Email
</h3>

<p class="text-white-50 text-center mb-4">Thanks for signing up! Please check your email for a verification link.</p>

@if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit" class="btn-gtr-primary w-100 mb-3">
        <i class="fas fa-redo me-1"></i> Resend Verification Email
    </button>
</form>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn-gtr-outline w-100">
        <i class="fas fa-sign-out-alt me-1"></i> Logout
    </button>
</form>
@endsection
