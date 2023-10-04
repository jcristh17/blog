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

                <div class="mt-2">
                    <a href="{{ url('/auth/redirect') }}">
                        <x-secondary-button
                            class="justify-center w-full border  border-gray-300 hover:border-gray-500 px-2 rounded-md">
                            <img class="w-5 mr-2" src="{{ asset('storage/images/google.png') }}">
                            Sign up with Google
                        </x-secondary-button>
                    </a>
                </div>

            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Already have account?
                <a href="{{ route('login') }}"
                    class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Sign in</a>
            </p>
        </div>

    </x-authentication-card>

</x-guest-layout>
