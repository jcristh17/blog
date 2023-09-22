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
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create your
                    account</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <x-validation-errors class="mb-4" />
                <form class="" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <div class="mt-2 flex flex-row">
                            <span
                                class="z-highest rounded-l-lg w-10 h-10 flex justify-center items-center text-2xl border border-r-0"
                                mode="render" block="">
                                <i class="fa-solid fa-user text-indigo-600"></i>
                            </span>
                            <x-input id="name"
                                class="h-10 border border-gray-200 rounded-r-lg outline-none focus:ring-1 ring-blue-300 w-full pl-1"
                                type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                                placeholder="Your name" />
                        </div>
                    </div>
                    <div class="mt-2">

                        <div class="mt-2 flex flex-row">
                            <span
                                class="z-highest rounded-l-lg w-10 h-10 flex justify-center items-center text-2xl border border-r-0"
                                mode="render" block="">
                                <i class="fa-solid fa-at text-indigo-600"></i>
                            </span>
                            <x-input type="email" name="email" id="email"
                                class="h-10 border border-gray-200 rounded-r-lg outline-none focus:ring-1 ring-blue-300 w-full pl-1"
                                :value="old('email')" required autofocus autocomplete="username"
                                placeholder="Email address" />
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="mt-2 flex flex-row">
                            <span
                                class="z-highest rounded-l-lg w-10 h-10 flex justify-center items-center text-2xl border border-r-0"
                                mode="render" block="">
                                <i class="fa-solid fa-key text-indigo-600"></i>
                            </span>
                            <x-input
                                class="h-10 border border-gray-200 rounded-r-lg outline-none focus:ring-1 ring-blue-300 w-full pl-1"
                                placeholder="Password" id="password" type="password" name="password" required
                                autocomplete="new-password" />
                        </div>
                    </div>
                    <div class="mt-2 mb-6">
                        <div class="mt-2 flex flex-row">
                            <span
                                class="z-highest rounded-l-lg w-10 h-10 flex justify-center items-center text-2xl border border-r-0"
                                mode="render" block="">
                                <i class="fa-solid fa-key text-indigo-600"></i>
                            </span>
                            <x-input type="password"
                                class="h-10 border border-gray-200 rounded-r-lg outline-none focus:ring-1 ring-blue-300 w-full pl-1"
                                id="password_confirmation" placeholder="Confirmation password" name="password_confirmation" required autocomplete="new-password" />
                        </div>
                    </div>

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
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
