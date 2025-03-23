@if (Auth::user()->userType != 'admin')
    <section>
        <header>
            <h2 class="mt-2 text-lg font-bold title-color">
                {{ __('Profile Information') }}
            </h2>

            <p class="mt-1 text-sm text-color">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <div class="border-b border-gray-900/10 pb-4"> <!-- straight grey line -->
                <div class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-6">
                    <!-- First Name -->
                    <div class="sm:col-span-3">
                        <x-input-label for="first_name" :value="__('First Name')" class="input-name"/>
                        <x-text-input id="first_name" name="first_name" type="text" class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-gray-700 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                            :value="old('first_name', $user->first_name)" required autofocus autocomplete="first_name" />
                        <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                    </div>
                    <!-- Last Name -->
                    <div class="sm:col-span-3">
                        <x-input-label for="last_name" :value="__('Last Name')" class="input-name"/>
                        <x-text-input id="last_name" name="last_name" type="text" class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-gray-700 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                            :value="old('last_name', $user->last_name)" required autofocus autocomplete="last_name" />
                        <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                    </div>
                    <!-- MyCard Number -->
                    <div class="sm:col-span-3">
                        <x-input-label for="mycard_number" :value="__('MyCard Number')" class="input-name"/>
                        <x-text-input id="mycard_number" name="mycard_number" type="text" class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-gray-700 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                            :value="old('mycard_number', $user->mycard_number)" required autofocus readonly autocomplete="mycard_number" />
                        <x-input-error class="mt-2" :messages="$errors->get('mycard_number')" />
                    </div>
                    <!-- Phone Number -->
                    <div class="sm:col-span-3">
                        <x-input-label for="phone_number" :value="__('Phone Number')" class="input-name"/>
                        <x-text-input id="phone_number" name="phone_number" type="text" class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-gray-700 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                            :value="old('phone_number', $user->phone_number)" required autofocus autocomplete="phone_number" />
                        <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="input-name" />
                <x-text-input id="email" name="email" type="email" class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-gray-700 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </section>
@else
    <section>
        <header>
            <h2 class="text-lg font-bold title-color">
                {{ __('Profile Information') }}
            </h2>

            <p class="mt-1 text-sm text-color">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <!-- First Name -->
            <div>
                <x-input-label for="first_name" :value="__('First Name')" class="input-name" />
                <x-text-input id="first_name" name="first_name" type="text" class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-gray-700 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    :value="old('first_name', $user->first_name)" required autofocus autocomplete="first_name" />
                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
            </div>
            <!-- Last Name -->
            <div>
                <x-input-label for="last_name" :value="__('Last Name')" class="input-name"/>
                <x-text-input id="last_name" name="last_name" type="text" class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-gray-700 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    :value="old('last_name', $user->last_name)" required autofocus autocomplete="last_name" />
                <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
            </div>
            <!-- MyCard Number -->
            <div>
                <x-input-label for="mycard_number" :value="__('MyKad Number')" class="input-name"/>
                <x-text-input id="mycard_number" name="mycard_number" type="text" class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-gray-700 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    :value="old('mycard_number', $user->mycard_number)" required autofocus readonly autocomplete="mycard_number" />
                <x-input-error class="mt-2" :messages="$errors->get('mycard_number')" />
            </div>
            <!-- Phone Number -->
            <div>
                <x-input-label for="phone_number" :value="__('Phone Number')" class="input-name"/>
                <x-text-input id="phone_number" name="phone_number" type="text" class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-gray-700 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    :value="old('phone_number', $user->phone_number)" required autofocus autocomplete="phone_number" />
                <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
            </div>

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="input-name"/>
                <x-text-input id="email" name="email" type="email" class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-gray-700 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>

    </section>
@endif
