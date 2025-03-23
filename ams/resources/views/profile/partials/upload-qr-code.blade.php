<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold title-color">
            {{ __('Upload QR Code') }}
        </h2>

        <p class="mt-1 text-sm text-color">
            {{ __('Please upload your QR code image.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.upload.qr.code') }}" enctype="multipart/form-data">
        @csrf
        @if ($user->qrCodeImage)
            <div class="mt-2">
                <img src="{{ route('profile.get-qr-code') }}" alt="QR Code Image" class="w-48 h-48">
            </div>
        @endif
        <div class="mt-6">
            <x-input-label for="qr_code_image" value="{{ __('QR Code Image') }}" class="sr-only" />

            <input type="file" id="qr_code_image" name="qr_code_image"
                class="mt-1 block w-3/4 rounded-lg border-1 border-indigo-300 p-2 text-color" required>

            <x-input-error :messages="$errors->get('qr_code_image')" class="mt-2" />
        </div>

        <div class="mt-6 gap-4 flex justify-start">
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Upload QR Code') }}
            </button>

            <button type="reset"
                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                {{ __('Cancel') }}
            </button>
        </div>


    </form>
</section>
