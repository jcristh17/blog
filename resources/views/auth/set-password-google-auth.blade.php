@auth
    @if (auth()->user()->password == '')
        <x-guest-layout>
            <x-authentication-card>
                <x-slot name="logo">
                    <x-authentication-card-logo />
                </x-slot>
                <div class="mb-4 text-sm text-gray-600">
                    {{ auth()->user()->name }} {{ __(', before continuing, you must set your account password.') }}
                </div>
                <x-slot name="title">
                    Set your password account
                </x-slot>
                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('setPasswordUser', ['user' => auth()->user()]) }}">
                    @method('PATCH')
                    @csrf
                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>
                    <div class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Complete register') }}
                        </x-button>
                    </div>
                </form>
            </x-authentication-card>
        </x-guest-layout>
    @endif
@endauth
