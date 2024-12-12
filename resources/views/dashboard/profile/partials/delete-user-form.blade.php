<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>


    <form id="formAccountDeactivation" action="{{ route('profile.destroy') }}" method="POST"
        class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
        @csrf
        @method('DELETE')
        <div class="form-check mb-4">
            <input class="form-check-input is-invalid" type="checkbox" name="accountActivation" id="accountActivation">
            <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
        </div>
        <button type="submit" class="btn btn-danger deactivate-account waves-effect waves-light"
            disabled="disabled">Deactivate Account</button>
    </form>

</section>
