@section('title', 'Tabika Kemas Kampung Senaling')

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <x-primary-button
            class="justify-center block w-full rounded-lg bg-black px-5 py-3 mt-4 text-sm font-medium text-white">
            {{ __('Sign In') }}
        </x-primary-button>

        <div class="text-center text-sm text-gray-500 mt-4">
            @if (Route::has('register'))
                <a class="underline text-sm text-gray-600 hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <div class="border-t border-gray-200 mt-4"></div>

            <div class="text-center text-sm text-gray-500 mt-4">
                Don't have an account?
                @if (Route::has('register'))
                    <a class="underline text-sm text-gray-600 hover:text-blue-900 focus:bold"
                        href="{{ route('register') }}">
                        Sign Up
                    </a>
                @endif
            </div>
    </form>
</x-guest-layout>
