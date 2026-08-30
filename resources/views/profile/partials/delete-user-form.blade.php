<section>
    <div class="contact-form-card">
        <header>
            <h2 class="detail-section-title" style="border-color: #dc3545;">{{ __('Delete Account') }}</h2>
            <p class="text-white-50 mb-4">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}</p>
        </header>

        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletion">
            <i class="fas fa-trash me-1"></i> {{ __('Delete Account') }}
        </button>

        <div class="modal fade" id="confirmUserDeletion" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background: var(--gtr-dark-2); border: 1px solid var(--gtr-gray);">
                    <div class="modal-header" style="border-color: var(--gtr-gray);">
                        <h5 class="modal-title text-white">{{ __('Are you sure you want to delete your account?') }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')
                        <div class="modal-body">
                            <p class="text-white-50">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}</p>
                            <input name="password" type="password" class="form-control filter-input" placeholder="{{ __('Password') }}">
                            @error('password', 'userDeletion') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="modal-footer" style="border-color: var(--gtr-gray);">
                            <button type="button" class="btn-gtr-outline" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
