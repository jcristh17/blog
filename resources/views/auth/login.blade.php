<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">

        </x-slot>



        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Your Company">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
                    account</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <x-validation-errors class="mb-4" />
                <form class="" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <div class="my-2 flex flex-row">
                            <span
                                class="z-highest rounded-l-lg w-10 h-10 flex justify-center items-center text-2xl border border-r-0"
                                mode="render" block="">
                                <i class="fa-solid fa-at text-indigo-600"></i>
                            </span>
                            <x-input type="email" name="email" id="email"
                                class="h-10 border border-gray-200 rounded-r-lg outline-none focus:ring-1 ring-blue-300 w-full pl-1"
                                :value="old('email')" required autofocus autocomplete="username" />
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <div class="text-sm">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                                @endif
                            </div>
                        </div>
                        <div class="my-2 flex flex-row">
                            <span
                                class="z-highest rounded-l-lg w-10 h-10 flex justify-center items-center text-2xl border border-r-0"
                                mode="render" block="">
                                <i class="fa-solid fa-key text-indigo-600"></i>
                            </span>
                            <x-input type="password"
                                class="h-10 border border-gray-200 rounded-r-lg outline-none focus:ring-1 ring-blue-300 w-full pl-1"
                                id="password" name="password" placeholder="" required
                                autocomplete="current-password" />
                        </div>
                    </div>

                    <div>
                        <x-button
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                            in</x-button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-500">Not have account?
                    <a href="{{ route('register') }}"
                        class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Sign up</a>
                </p>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
