@extends('layouts.guest')

@section('title', 'Confirm Password')

@section('content')
<h3 class="text-center mb-4" style="font-family: var(--font-display); font-size: 1.5rem; color: var(--gtr-white);">
    <i class="fas fa-lock me-2" style="color: var(--gtr-red);"></i>Confirm Password
</h3>

<p class="text-white-50 text-center mb-4">Please confirm your password to continue.</p>

<form method="POST" action="{{ route('password.confirm') }}">
    @csrf

    <div class="mb-4">
        <input type="password" name="password" class="form-control filter-input" placeholder="Password" required autofocus>
        @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
    </div>

    <button type="submit" class="btn-gtr-primary w-100">
        <i class="fas fa-check me-1"></i> Confirm
    </button>
</form>
@endsection
