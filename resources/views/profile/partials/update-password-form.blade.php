<section>
    <div class="contact-form-card">
        <header>
            <h2 class="detail-section-title">{{ __('Update Password') }}</h2>
            <p class="text-white-50 mb-4">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
        </header>

        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="mb-3">
                <label class="filter-label" for="update_password_current_password">{{ __('Current Password') }}</label>
                <input id="update_password_current_password" name="current_password" type="password" class="form-control filter-input" autocomplete="current-password">
                @error('current_password', 'updatePassword') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="filter-label" for="update_password_password">{{ __('New Password') }}</label>
                <input id="update_password_password" name="password" type="password" class="form-control filter-input" autocomplete="new-password">
                @error('password', 'updatePassword') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="filter-label" for="update_password_password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control filter-input" autocomplete="new-password">
            </div>

            <div class="mt-4">
                <button type="submit" class="btn-gtr-primary">
                    <i class="fas fa-save me-1"></i> {{ __('Save') }}
                </button>

                @if (session('status') === 'password-updated')
                    <span class="text-success ms-3">{{ __('Saved.') }}</span>
                @endif
            </div>
        </form>
    </div>
</section>
