@section('title', 'Fees')

<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="bg-white shadow rounded-lg min-w-fit min-h-full mx-4 p-4 sm:py-8 sm:px-6 lg:px-8">
        <div class="border-b-2 border-indigo-300/50 pb-4"> <!-- straight grey line at the bottom -->
            <div class="flex items-center justify-between">
                <h2 class="mt-8 font-semibold text-xl title-color leading-tight">
                    {{ __('Children Monthly Fees') }}
                </h2>
                <div class="flex justify-end">
                    <a class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                        href="{{ route('fee.pay-all', auth()->id()) }}">
                        Pay Fees for All
                    </a>
                </div>
            </div>
        </div>

        @if (session()->has('message'))
            <div role="alert" id="alert-message" class="rounded-xl bg-white shadow-md p-4 my-4">
                <div class="flex items-start gap-4">
                    <span class="text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>

                    <div class="flex-1">
                        <strong class="block font-medium title-color">{{ session()->get('message') }}</strong>
                    </div>

                    <button class="title-color transition hover:text-gray-600">
                        <span class="sr-only">Dismiss popup</span>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <script>
                setTimeout(function() {
                    document.getElementById('alert-message').style.display = 'none';
                }, 5000); // hide the message after 3 seconds
            </script>
        @endif


        <div class="m-4 rounded-lg border border-gray-200">
            <div class=" rounded-t-lg">
                <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
                    <thead class="ltr:text-left rtl:text-right font-bold input-name">
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2 rounded-tl-lg table-header">No.</th>
                            <th class="whitespace-nowrap px-4 py-2 table-header">Student Name</th>
                            <th class="whitespace-nowrap px-4 py-2 table-header">MyKid Number</th>
                            <th class="whitespace-nowrap px-4 py-2 table-header">Birth Date</th>
                            <th class="whitespace-nowrap px-4 py-2 table-header">Age</th>
                            <th class="whitespace-nowrap px-4 py-2 table-header">Gender</th>
                            <th class="whitespace-nowrap px-4 py-2 table-header">Class of</th>
                            <th class="whitespace-nowrap px-4 py-2 rounded-tr-lg table-header">Action</th>
                        </tr>
                    </thead>
                    @foreach ($students as $student)
                        <tbody class="divide-y divide-gray-200 font-thin input-text">
                            <tr>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    {{ $loop->index + 1 }}
                                </td>
                                <td hidden class="whitespace-nowrap text-center px-4 py-2">
                                    {{ $student->id }}
                                </td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    {{ $student->sname }}
                                </td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    {{ $student->mykid_number }}
                                </td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    {{ date('d F Y', strtotime($student->sbirth_date)) }}
                                </td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    {{ $student->age }}
                                </td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    {{ $student->gender }}
                                </td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    {{ $student->class_of }}
                                </td>
                                <td class="whitespace-nowrap text-center py-2">

                                    <a class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                        href="{{ route('fee.show', $student->id) }}">
                                        View
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
