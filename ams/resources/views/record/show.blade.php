@section('title', 'Daily Records')

<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="bg-white shadow rounded-lg min-w-fit min-h-full mx-4 p-4 sm:py-8 sm:px-6 lg:px-8">
        <div class="border-b-2 border-indigo-300/50 pb-4"> <!-- straight grey line at the bottom -->
            <h2 class="font-semibold text-xl title-color leading-tight">
                Records for {{ $student->sname }}
            </h2>
        </div>

        <div class="m-4 rounded-lg border border-gray-200">
            <div class="overflow-x-auto rounded-t-lg rounded-b-lg">
                <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
                    <thead class="ltr:text-left rtl:text-right font-bold table-header">
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2">Date</th>
                            <th class="whitespace-nowrap px-4 py-2">Attendance</th>
                            <th class="whitespace-nowrap px-4 py-2">Drop Off Time</th>
                            <th class="whitespace-nowrap px-4 py-2">Sleep Well</th>
                            <th class="whitespace-nowrap px-4 py-2">Take Bath</th>
                            <th class="whitespace-nowrap px-4 py-2">Brush Teeth</th>
                            <th class="whitespace-nowrap px-4 py-2">Health Condition</th>
                            <th class="whitespace-nowrap px-4 py-2">Pick Up Time</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 font-thin input-text">
                        <!-- Record loop -->
                        @foreach ($records as $record)
                            <tr @if ($loop->index % 2 == 1) class="bg-blue-50" @endif>
                                <td class="whitespace-nowrap text-center px-4 py-2 ">
                                    {{ date('d F Y', strtotime($record->date)) }}</td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    {{ $record->attendance }}
                                </td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    @if ($record->dropoff_time)
                                        {{ date('g:i A', strtotime($record->dropoff_time)) }}
                                    @else
                                    @endif
                                </td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    @if ($record->sleepwell == 'Yes')
                                        <span class="text-green-500">✔</span>
                                    @else
                                        <span class="text-red-500">✘</span>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    @if ($record->takebath == 'Yes')
                                        <span class="text-green-500">✔</span>
                                    @else
                                        <span class="text-red-500">✘</span>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    @if ($record->brushteeth == 'Yes')
                                        <span class="text-green-500">✔</span>
                                    @else
                                        <span class="text-red-500">✘</span>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    @if ($record->healthcondition == 'Yes')
                                        <span class="text-green-500">✔</span>
                                    @else
                                        <span class="text-red-500">✘</span>
                                    @endif
                                </td>
                                @if (Auth::user()->userType != 'admin')
                                    <td class="whitespace-nowrap text-center px-4 py-2">
                                        @if ($record->attendance == 'Not Attend')
                                            <span class="text-red-500">✘</span>
                                        @else
                                            @if (!$record->pickup_time_updated)
                                                <a class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                                    href="/record/{{ $record->id }}/edit">
                                                    Update
                                                </a>
                                            @else
                                                {{ date('g:i A', strtotime($record->pickup_time)) }}
                                            @endif
                                        @endif
                                    </td>
                                @else
                                    <td class="whitespace-nowrap text-center px-4 py-2">
                                        @if ($record->pickup_time)
                                            {{ date('g:i A', strtotime($record->pickup_time)) }}
                                        @else
                                            @if ($record->attendance == 'Not Attend')
                                                <span class="text-red-500">✘</span>
                                            @else
                                            @endif
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
                <a href="/records"
                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                    Return
                </a>
            @else
                <a href="/admin/records"
                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                    Return
                </a>
            @endif
        </div>
    </div>
</x-app-layout>
