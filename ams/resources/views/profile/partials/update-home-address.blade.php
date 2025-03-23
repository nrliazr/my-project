<section>
    <header>
        <h2 class="mt-2 text-lg font-bold title-color">
            {{ __('Home Address') }}
        </h2>

        <p class="mt-1 text-sm text-color">
            {{ __('Update your home address.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update.home.address') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="border-b border-gray-900/10 pb-4"> <!-- straight grey line -->
            <div class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-6">
                <!-- Address Line 1-->
                <div class="sm:col-span-3">
                    <x-input-label for="address_line1" :value="__('Address Line 1')" class="input-name"/>
                    <x-text-input id="address_line1" name="address_line1" type="text" class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                        :value="old('address_line1', $homeAddress->address_line1)" required autofocus autocomplete="address_line1" />
                    <x-input-error class="mt-2" :messages="$errors->get('address_line1')" />
                </div>
                <!-- Address Line 2 -->
                <div class="sm:col-span-3">
                    <x-input-label for="address_line2" :value="__('Address Line 2')" class="input-name"/>
                    <x-text-input id="address_line2" name="address_line2" type="text" class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                        :value="old('address_line2', $homeAddress->address_line2)" required autofocus autocomplete="address_line2" />
                    <x-input-error class="mt-2" :messages="$errors->get('address_line2')" />
                </div>
                <!-- Post Code -->
                <div class="sm:col-span-2 sm:col-start-1">
                    <x-input-label for="post_code" :value="__('Post Code')" class="input-name"/>
                    <x-text-input id="post_code" name="post_code" type="text" class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                        :value="old('post_code', $homeAddress->post_code)" required autofocus autocomplete="post_code" />
                    <x-input-error class="mt-2" :messages="$errors->get('post_code')" />
                </div>
                <!-- District -->
                <div class="sm:col-span-2">
                    <x-input-label for="district" :value="__('District')" class="input-name"/>
                    <x-text-input id="district" name="district" type="text" class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                        :value="old('district', $homeAddress->district)" required autofocus autocomplete="district" />
                    <x-input-error class="mt-2" :messages="$errors->get('district')" />
                </div>
                <!-- State -->
                <div class="sm:col-span-2">
                    <x-input-label for="state" :value="__('State')" class="input-name"/>
                    <x-text-input id="state" name="state" type="text" class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                        :value="old('state', $homeAddress->state)" required autofocus autocomplete="state" />
                    <x-input-error class="mt-2" :messages="$errors->get('state')" />
                </div>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'home-address-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
