<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div class="row g-4 mb-4">
        <div class="col-12 col-md-6">
            <div class="card h-100">
                <div class="card-body g-3">
                    @include('dashboard.profile.partials.update-profile-information-form')
                </div>
            </div>

        </div>
        <div class="col-12 col-md-6">
            <div class="card h-100">
                <div class="card-body g-3">
                    @include('dashboard.profile.partials.update-password-form')
                </div>
            </div>

        </div>
        <div class="col-12">
            <div class="card h-100">
                <div class="card-body g-3">
                    @include('dashboard.profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>

    <x-alert-message />
    @section('customs_js')
        <script src="{{ asset('js/dashboard/pages-account-settings-account.js') }}"></script>
        <script src="{{ asset('js/dashboard/pages-account-settings-security.js') }}"></script>
    @endsection
</x-app-layout>
