<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo"></x-slot>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <x-slot name="title">Sign in to your
                account</x-slot>
            <x-validation-errors class="mb-4" />
            <form class="" method="POST" action="{{ route('login') }}">
                @csrf
                <x-label for="email" value="{{ __('Email') }}" />
                <x-icon-input class="w-full" icon="fa-solid fa-envelope text-indigo-600" iconcolor="text-indigo-600"
                    type="email" name="email" id="email" :value="old('email')" required autofocus
                    autocomplete="username" />
                <div class="flex items-center justify-between">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <div class="text-sm">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        @endif
                    </div>
                </div>
                <x-icon-input class="w-full" icon="fa-solid fa-lock text-indigo-600" iconcolor="text-indigo-600"
                    type="password" id="password" name="password" placeholder="" required
                    autocomplete="current-password" />
                <div class="py-2">
                    <x-button
                        class="flex w-full active:bg-indigo-900 justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                        in</x-button>
                </div>
                <div class="mt-2">
                    <a href="{{ url('/login/redirect') }}">
                        <x-secondary-button
                            class="justify-center w-full border  border-gray-300 hover:border-gray-500 px-2 rounded-md">
                            <img class="w-5 mr-2" src="{{ asset('storage/images/google.png') }}">
                            Sign in with Google
                        </x-secondary-button>
                    </a>
                    @if (session('error'))
                        <x-alerts.danger>
                            <strong>{{ session('error') }}</strong>
                        </x-alerts.danger>
                    @endif
                </div>
            </form>
            <p class="mt-10 text-center text-sm text-gray-500">Not have account?
                <a href="{{ route('register') }}"
                    class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Sign up</a>
            </p>
        </div>
    </x-authentication-card>
</x-guest-layout>
