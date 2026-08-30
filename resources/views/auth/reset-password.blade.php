@extends('layouts.guest')

@section('title', 'Reset Password')

@section('content')
<h3 class="text-center mb-4" style="font-family: var(--font-display); font-size: 1.5rem; color: var(--gtr-white);">
    <i class="fas fa-key me-2" style="color: var(--gtr-red);"></i>Reset Password
</h3>

<form method="POST" action="{{ route('password.reset') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="mb-3">
        <input type="email" name="email" class="form-control filter-input" value="{{ old('email', $email) }}" placeholder="Email" required autofocus>
        @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <input type="password" name="password" class="form-control filter-input" placeholder="New Password" required>
        @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <input type="password" name="password_confirmation" class="form-control filter-input" placeholder="Confirm Password" required>
    </div>

    <button type="submit" class="btn-gtr-primary w-100">
        <i class="fas fa-save me-1"></i> Reset Password
    </button>
</form>
@endsection
