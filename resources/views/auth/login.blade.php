@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<h3 class="text-center mb-4" style="font-family: var(--font-display); font-size: 1.5rem; color: var(--gtr-white);">
    <i class="fas fa-sign-in-alt me-2" style="color: var(--gtr-red);"></i>Login
</h3>

@if(session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3">
        <label class="filter-label" for="email">Email</label>
        <input id="email" type="email" name="email" class="form-control filter-input" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="your@email.com">
        @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="filter-label" for="password">Password</label>
        <input id="password" type="password" name="password" class="form-control filter-input" required autocomplete="current-password" placeholder="Your password">
        @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label text-white-50" for="remember">Remember me</label>
        </div>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" style="color: var(--gtr-red); font-size: 0.85rem;">Forgot password?</a>
        @endif
    </div>

    <button type="submit" class="btn-gtr-primary w-100 mb-3">
        <i class="fas fa-sign-in-alt me-1"></i> Login
    </button>

    <p class="text-center text-white-50 mb-0">
        Don't have an account?
        <a href="{{ route('register') }}" style="color: var(--gtr-red);">Register</a>
    </p>
</form>
@endsection
