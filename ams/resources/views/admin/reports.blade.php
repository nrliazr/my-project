@php
    use App\Models\Report;
@endphp
@section('title', 'Reports')

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="bg-white shadow rounded-lg min-w-fit min-h-full mx-4 p-4 sm:py-8 sm:px-6 lg:px-8">
        <div class="border-b-2 border-indigo-300/50 pb-4"> <!-- straight grey line at the bottom -->
            <h2 class="font-semibold text-xl title-color leading-tight">
                {{ __('Reports') }}
            </h2>
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
            <div class="overflow-x-auto rounded-t-lg rounded-b-lg">
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="ltr:text-left rtl:text-right font-bold table-header">
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2">Title</th>
                            <th class="whitespace-nowrap px-4 py-2">Description</th>
                            <th class="whitespace-nowrap px-4 py-2">Location</th>
                            <th class="whitespace-nowrap px-4 py-2">Date</th>
                            <th class="whitespace-nowrap px-4 py-2">Time</th>
                            <th class="whitespace-nowrap px-4 py-2">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 font-thin input-text">
                        @foreach ($reports as $report)
                            <tr>
                                <td class="whitespace-nowrap px-4 py-2">
                                    {{ $report->title }}</td>
                                <td class="line-clamp-4 text-justify px-4 py-2">
                                    {{ $report->description }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $report->location }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-2">
                                    {{ date('d F Y', strtotime($report->date)) }}</td>
                                <td class="whitespace-nowrap px-4 py-2">
                                    {{ date('g:i A', strtotime($report->time)) }}</td>
                                <td class="whitespace-nowrap px-4 py-2">
                                    @if (!Report::where('id', $report->id)->exists())
                                        <a class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                            href="{{ route('report.create', ['report' => $report->id]) }}"
                                            title="Create">
                                            Create
                                        </a>
                                    @else
                                        <span
                                            class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest opacity-50 cursor-not-allowed hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            Create
                                        </span>
                                    @endif
                                    <a class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                        href="{{ route('report.show', $report->id) }}" title="View">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
