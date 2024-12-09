<x-guest-layout>
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 p-0">
                <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                    <img src="{{ asset('img/illustrations/auth-reset-password-illustration-light.png') }}"
                        alt="auth-reset-password-cover" class="img-fluid my-5 auth-illustration"
                        data-app-light-img="illustrations/auth-reset-password-illustration-light.png"
                        data-app-dark-img="illustrations/auth-reset-password-illustration-dark.png" />

                    <img src="{{ asset('img/illustrations/bg-shape-image-light.png') }}" alt="auth-reset-password-cover"
                        class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png"
                        data-app-dark-img="illustrations/bg-shape-image-dark.png" />
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Reset Password -->
            <div class="d-flex col-12 col-lg-5 align-items-center p-4 p-sm-5">
                <div class="w-px-400 mx-auto">
                    <!-- Logo -->
                    <div class="app-brand mb-4">
                        <a href="index.html" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                        fill="#7367F0" />
                                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                                        fill="#161616" />
                                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                                        fill="#161616" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                        fill="#7367F0" />
                                </svg>
                            </span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-1">Reset Password 🔒</h4>
                    <p class="mb-4">for <span class="fw-medium">{{ $_GET['email'] }}</span></p>
                    <form id="formAuthentication" class="mb-3" action="{{ route('password.store') }}" method="POST">
                        @csrf
                        <div class="mb-3 form-password-toggle">
                            <x-input-label for="password" :value="__('Password')" />
                            <div class="input-group input-group-merge">
                                <x-text-input id="password" class="block   w-full" type="password" name="password"
                                    :value="old('password')" required autofocus autocomplete=""
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <x-input-label for="password_confirm" :value="__('Password Confirm')" />
                            <div class="input-group input-group-merge">
                                <x-text-input id="password_confirm" class="block  w-full" type="password"
                                    name="password_confirm" :value="old('password_confirm')" required autofocus
                                    autocomplete="password_confirm"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                            <x-input-error :messages="$errors->get('password_confirm')" class="mt-2" />
                        </div>
                        <input type="hidden" name="token" value="{{ $request['token'] }}">
                        <x-input-error :messages="$errors->get('token')" class="mt-2" />
                        <input type="hidden" name="email" value="{{ $_GET['email'] }}">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <x-primary-button type='submit' class="w-100">Set new password</x-primary-button>
                        <div class="text-center">
                            <a href="{{ route('login') }}">
                                <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                                Back to login
                            </a>
                        </div>
                    </form>
                </div>
                <x-alert-message />
            </div>
            <!-- /Reset Password -->
        </div>
    </div>
    @section('customs_css')
        <link rel="stylesheet" href="{{ asset('vendor/css/pages/page-auth.css') }}" />
    @endsection
    @section('customs_js')
        <script src="{{ asset('js/pages-auth.js') }}"></script>
    @endsection
</x-guest-layout>
