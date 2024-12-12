<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"> Edit User</h2>
    </x-slot>

    <div class="content-wrapper">
        <!-- Content -->
        <div>
            <h4><a href="/users" class="text-muted fw-light"> User Lists /</a> Edit Users</h4>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <li>{{ $errors->first() }}</li>
                </ul>
            </div>
        @endif
        <div class="row g-4">
            <div class="col-12 col-md-6">
                <div class="card h-100">
                    <div class="card-body g-3">
                        <form method="post" action="{{ route('users.update', $user->id) }}" id="userEditForm"
                            class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div class="mb-3">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="block w-full"
                                    :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div class="mb-3">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="block w-full"
                                    :value="old('email', $user->email)" required autocomplete="email" disabled />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="role" :value="__('Role')" />
                                <select class="select2 form-select" name="role" id="role">
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="switch">
                                    <input type="checkbox" class="switch-input" id="is_email_verified"
                                        name="is_email_verified" value="1" @checked($user->email_verified_at ? 1 : 0)>
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on"></span>
                                        <span class="switch-off"></span>
                                    </span>
                                    <span class="switch-label">Verify your email</span>
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="switch">
                                    <input type="checkbox" class="switch-input" id="is_email_2fa" name="is_email_2fa"
                                        value="1" @checked($user->is_email_2fa)>
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on"></span>
                                        <span class="switch-off"></span>
                                    </span>
                                    <span class="switch-label">Verify Identity by email (2FA)</span>
                                </label>
                            </div>

                            <div class="flex items-center gap-4 pt-2">
                                <x-primary-button type="submit"
                                    id="profile-submit">{{ __('Save') }}</x-primary-button>
                                @if (session('status') === 'profile-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @section('customs_js')
        <script src="{{ asset('js/dashboard/pages-user-edit.js') }}"></script>
    @endsection
</x-app-layout>
