@extends('layouts.guest')

@section('title', 'Forgot Password')

@section('content')
<h3 class="text-center mb-4" style="font-family: var(--font-display); font-size: 1.5rem; color: var(--gtr-white);">
    <i class="fas fa-key me-2" style="color: var(--gtr-red);"></i>Forgot Password
</h3>

<p class="text-white-50 text-center mb-4">Enter your email and we'll send you a reset link.</p>

@if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="mb-4">
        <input type="email" name="email" class="form-control filter-input" value="{{ old('email') }}" placeholder="your@email.com" required autofocus>
        @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
    </div>

    <button type="submit" class="btn-gtr-primary w-100 mb-3">
        <i class="fas fa-paper-plane me-1"></i> Send Reset Link
    </button>

    <p class="text-center text-white-50 mb-0">
        <a href="{{ route('login') }}" style="color: var(--gtr-red);">Back to Login</a>
    </p>
</form>
@endsection
