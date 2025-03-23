@section('title', 'Monthly Fees')

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="bg-white shadow rounded-lg min-w-fit min-h-full mx-4 p-4 sm:py-8 sm:px-6 lg:px-8">
        <div class="border-b-2 border-indigo-300/50 pb-4"> <!-- straight grey line at the bottom -->
            <h2 class="font-semibold text-xl title-color leading-tight">
                Fees for {{ $student->sname }}
            </h2>
        </div>

        <form id="payment-form" action="{{ route('fee.pay', ['student' => $student->id]) }}" method="GET">
            @csrf
            <div class="m-4 rounded-lg border border-gray-200">
                <div class="overflow-x-auto rounded-t-lg">
                    <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
                        <thead class="ltr:text-left rtl:text-right font-bold table-header">
                            <tr>
                                <th class="whitespace-nowrap px-4 py-2">Month</th>
                                <th class="whitespace-nowrap px-4 py-2">Year</th>
                                <th class="whitespace-nowrap px-4 py-2">Total Amount</th>
                                <th class="whitespace-nowrap px-4 py-2">Status</th>
                                <th class="whitespace-nowrap px-4 py-2">Paid Amount</th>
                                <th class="whitespace-nowrap px-4 py-2">Payment Date</th>
                                <th class="whitespace-nowrap px-4 py-2">Payment Method</th>
                                @if (Auth::user()->userType != 'admin')
                                    <th class="whitespace-nowrap px-4 py-2">Action</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 font-thin">
                            <!-- Record loop -->
                            @foreach ($fees as $fee)
                                <tr @if ($loop->index % 2 == 1) class="bg-blue-50" @endif>
                                    <td hidden>
                                        <input type="hidden" name="total_amount" id="total_amount" value="0">
                                    </td>
                                    <td class="whitespace-nowrap text-center px-4 py-2 input-text">
                                        {{ date('F', mktime(0, 0, 0, $fee->month, 1)) }}
                                    </td>
                                    <td class="whitespace-nowrap text-center px-4 py-2 input-text">
                                        {{ $fee->year }}
                                    </td>
                                    <td class="whitespace-nowrap text-center px-4 py-2 input-text">
                                        RM {{ number_format($fee->total_amount, 2) }}
                                    </td>
                                    <td class="whitespace-nowrap text-center px-4 py-2 input-text">
                                        <span
                                            class="{{ str_contains($fee->status, 'due') ? 'text-red-500' : 'text-green-500' }}">{{ $fee->status }}</span>
                                    </td>
                                    <td class="whitespace-nowrap text-center px-4 py-2 input-text">
                                        {{ $fee->paid_amount ? 'RM ' . number_format($fee->paid_amount, 2) : ' ' }}
                                    </td>
                                    <td class="whitespace-nowrap text-center px-4 py-2 input-text">
                                        {{ $fee->payment_date ? date('d F Y', strtotime($fee->payment_date)) : ' ' }}
                                    </td>
                                    <td class="whitespace-nowrap text-center px-4 py-2 input-text">
                                        {{ $fee->payment_method }}
                                    </td>
                                    @if (Auth::user()->userType != 'admin')
                                        <td class="whitespace-nowrap text-center px-4 py-2 text-gray-700">
                                            @if ($fee->status != 'Paid')
                                                <form action="{{ route('fee.pay', ['student' => $student->id]) }}"
                                                    method="GET">
                                                    @csrf
                                                    <input type="hidden" name="selected_month"
                                                        value="{{ $fee->month }}">
                                                    <button type="submit"
                                                        class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                        Pay
                                                    </button>
                                                </form>
                                            @else
                                                <button
                                                    class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest opacity-50 cursor-not-allowed hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                                    disabled>
                                                    Paid
                                                </button>
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex items-center justify-end m-4 gap-4 pt-4">
                @if (Auth::user()->userType != 'admin')
                    <a href="/fees"
                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Return
                    </a>
                @else
                    <a href="/admin/fees"
                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Return
                    </a>
                @endif
            </div>
        </form>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectAllButton = document.getElementById('select-all');
        selectAllButton.addEventListener('click', function() {
            var checkboxes = document.querySelectorAll('input.form-checkbox');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = !checkbox.checked;
            });
        });
    });
</script>
