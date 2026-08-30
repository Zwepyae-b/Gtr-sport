<section>
    <div class="contact-form-card">
        <header>
            <h2 class="detail-section-title">{{ __('Profile Information') }}</h2>
            <p class="text-white-50 mb-4">{{ __("Update your account's profile information and email address.") }}</p>
        </header>

        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <div class="mb-3">
                <label class="filter-label" for="name">{{ __('Name') }}</label>
                <input id="name" name="name" type="text" class="form-control filter-input" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="filter-label" for="email">{{ __('Email') }}</label>
                <input id="email" name="email" type="email" class="form-control filter-input" value="{{ old('email', $user->email) }}" required autocomplete="username">
                @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="btn-gtr-primary">
                    <i class="fas fa-save me-1"></i> {{ __('Save') }}
                </button>

                @if (session('status') === 'profile-updated')
                    <span class="text-success ms-3">{{ __('Saved.') }}</span>
                @endif
            </div>
        </form>
    </div>
</section>
