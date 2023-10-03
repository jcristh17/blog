<x-guest-layout>

    <x-authentication-card>

        <x-slot name="logo"></x-slot>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <x-slot name="title">Create your account</x-slot>

            <x-validation-errors class="mb-4" />

            <form class="" method="POST" action="{{ route('register') }}">
                @csrf

                <x-icon-input class="w-full" icon="fa-solid fa-user text-indigo-600" iconcolor="text-indigo-600"
                    type="text" name="name" :value="old('name')" required autofocus {{-- autocomplete="name" --}}
                    placeholder="Your name" />

                <x-icon-input class="w-full" icon="fa-solid fa-envelope text-indigo-600" iconcolor="text-indigo-600"
                    type="email" name="email" id="email" :value="old('username')" required autofocus
                    autocomplete="username" placeholder="Email address" />

                <x-icon-input class="w-full" icon="fa-solid fa-lock text-indigo-600" iconcolor="text-indigo-600"
                    placeholder="Password" id="password" type="password" name="password" required
                    autocomplete="new-password" />

                <x-icon-input class="w-full" icon="fa-solid fa-lock text-indigo-600" iconcolor="text-indigo-600"
                    id="password_confirmation" type="password" placeholder="Confirmation password"
                    name="password_confirmation" required autocomplete="new-password" />

                <div>
                    <x-button
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Sign up</x-button>
                </div>

            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Already have account?
                <a href="{{ route('login') }}"
                    class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Sign in</a>
            </p>
            <div class="flex items-center justify-center mt-4">
                <a href="{{ url('/auth/redirect') }}"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-black 
                focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"><i
                        class="fa-brands fa-google" style="margin-right: 5px;"></i> Register with Google</a>
            </div>
        </div>

    </x-authentication-card>

</x-guest-layout>
