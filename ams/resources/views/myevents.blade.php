@section('title', 'My Events')

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="bg-white shadow rounded-lg min-w-fit min-h-full mx-4 p-4 sm:py-8 sm:px-6 lg:px-8">
        <div class="border-b-2 border-indigo-300/50 pb-4"> <!-- straight grey line at the bottom -->
            <h2 class="mt-8 font-semibold text-xl title-color leading-tight">
                {{ __('My Events') }}
            </h2>
        </div>
        <div class=" rounded-t-lg">
            <div class="m-4 rounded-lg border border-gray-200">
                <div class=" rounded-t-lg">
                    <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
                        <thead class="ltr:text-left rtl:text-right font-bold input-name">
                            <tr>
                                <th class="whitespace-nowrap px-4 py-2 rounded-tl-lg table-header">Event Name</th>
                                <th class="whitespace-nowrap px-4 py-2 table-header">Location</th>
                                <th class="whitespace-nowrap px-4 py-2 table-header">Date</th>
                                <th class="whitespace-nowrap px-4 py-2 rounded-tr-lg table-header">Time</th>
                            </tr>
                        </thead>
                        <tbody class="text-center divide-y divide-gray-200 font-thin input-text">
                            @foreach ($attendances as $attendance)
                                <tr>
                                    <td class="whitespace-nowrap px-4 py-2">
                                        {{ $attendance->post->title }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-2">
                                        {{ $attendance->post->location }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-2">
                                        {{ date('g:i A', strtotime($attendance->post->time)) }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-2">
                                        {{ date('d F Y', strtotime($attendance->post->date)) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
