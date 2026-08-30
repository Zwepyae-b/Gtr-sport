@extends('layouts.guest')

@section('title', 'Register')

@section('content')
<h3 class="text-center mb-4" style="font-family: var(--font-display); font-size: 1.5rem; color: var(--gtr-white);">
    <i class="fas fa-user-plus me-2" style="color: var(--gtr-red);"></i>Create Account
</h3>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">
        <label class="filter-label" for="name">Name</label>
        <input id="name" type="text" name="name" class="form-control filter-input" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Your name">
        @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="filter-label" for="email">Email</label>
        <input id="email" type="email" name="email" class="form-control filter-input" value="{{ old('email') }}" required autocomplete="username" placeholder="your@email.com">
        @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="filter-label" for="password">Password</label>
        <input id="password" type="password" name="password" class="form-control filter-input" required autocomplete="new-password" placeholder="Min 8 characters">
        @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label class="filter-label" for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control filter-input" required autocomplete="new-password" placeholder="Confirm password">
    </div>

    <button type="submit" class="btn-gtr-primary w-100 mb-3">
        <i class="fas fa-user-plus me-1"></i> Register
    </button>

    <p class="text-center text-white-50 mb-0">
        Already have an account?
        <a href="{{ route('login') }}" style="color: var(--gtr-red);">Login</a>
    </p>
</form>
@endsection
