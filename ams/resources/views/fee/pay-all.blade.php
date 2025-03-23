@section('title', 'Pay')

<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="bg-white shadow rounded-lg min-w-fit min-h-full mx-4 p-4 sm:py-8 sm:px-6 lg:px-8">
        <div class="border-b-2 border-indigo-300/50 pb-4"> <!-- straight grey line at the bottom -->
            <h2 class="font-semibold text-xl title-color leading-tight">
                Pay For All
            </h2>
        </div>

        @if ($errors->any())
            <div role="alert" class="rounded border-s-4 border-red-500 bg-red-50 p-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="flex items-center gap-2 text-red-800">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="h-5 w-5">
                                <path fill-rule="evenodd"
                                    d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                    clip-rule="evenodd" />
                            </svg>

                            <strong class="block font-medium">{{ $error }}</strong>
                        </div>
                        <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('fee.pay-all.confirm', $user_id) }}" enctype="multipart/form-data">
            @csrf

            <div class="m-4 w-1/2">
                <label for="selected_month" class="input-name">Select Month</label>
                <select id="selected_month" name="selected_month"
                    class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5">
                    @foreach ($months as $month)
                        <option value="{{ $loop->index + 1 }}">{{ $month }}</option>
                    @endforeach
                </select>

                <!-- Total Amount will be calculated dynamically -->
                <label for="total_amount" class="input-name">Total Amount</label>
                <input type="number"
                    class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    step="0.01" name="total_amount" id="total_amount" value="{{ $totalAmount }}" readonly />

                <!-- Payment Method remains the same -->
                <label for="payment_method" class="input-name">Payment Method</label>
                <select id="payment_method" name="payment_method"
                    class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5">
                    <option value="Online payment">Online payment</option>
                </select>
            </div>
            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="{{ route('fees') }}"
                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                    Cancel
                </a>
                <button type="button" onclick="showQrCode()"
                    class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Pay
                </button>
            </div>

            <!-- Add the overlay element -->
            <div id="overlay" class="fixed top-0 left-0 w-full h-full bg-gray-900 opacity-50" hidden></div>

            <!-- hidden  qr code -->
            <div hidden id="qr-code-container"
                class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-1000 bg-white p-5 rounded-lg w-1/4 shadow-md sm:w-1/4">
                <form id="qr-code-form" method="post" action="{{ route('fee.pay-all.confirm', $user_id) }}">
                    @csrf
                    <div class="flex flex-col items-center gap-4 pt-4">
                        <img src="" id="qr-code" alt="QR Code" class="max-w-full max-h-full">
                        <div class="inline-block text-center items-center justify-center gap-4 pt-2">
                            <p class="mt-1 text-sm font-bold title-color">
                                {{ __('NURLIA AZRINA BINTI MUHAMMAD AZHAR') }}
                            </p>
                            <p class="mt-1 text-sm font-bold title-color">
                                {{ __('BANK ISLAM') }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-4 pt-10">
                        <button type="button"
                            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                            onclick="cancelPayment()">
                            Cancel
                        </button>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Done
                        </button>
                    </div>
                </form>
            </div>

        </form>
    </div>
</x-app-layout>

<script>
    function showQrCode() {
        const qrCodeContainer = document.getElementById("qr-code-container");
        const overlay = document.getElementById('overlay');
        qrCodeContainer.style.display = "block";
        overlay.hidden = false;

        const qrCodeImg = document.getElementById("qr-code");
        qrCodeImg.src = "{{ route('profile.get-qr-code') }}";

        // Add event listener to overlay
        overlay.addEventListener('click', cancelPayment);
    }

    function cancelPayment() {
        const qrCodeContainer = document.getElementById("qr-code-container");
        const overlay = document.getElementById('overlay');
        qrCodeContainer.style.display = "none";
        overlay.hidden = true;

        // Remove event listener to prevent multiple triggers
        overlay.removeEventListener('click', cancelPayment);
    }
</script>
