<title>{{ $post->title }}</title>

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="bg-white shadow rounded-lg min-w-fit min-h-full mx-4 p-4 sm:py-8 sm:px-6 lg:px-8">
        <div class="border-b-2 border-indigo-300/50 pb-4"> <!-- straight grey line at the bottom -->
            <h2 class="font-semibold text-xl title-color leading-tight">
                Attendances for {{ $post->title }}
            </h2>
        </div>

        <div class="m-4 rounded-lg border border-gray-200">
            <div class="overflow-x-auto rounded-t-lg rounded-b-lg">
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="ltr:text-left rtl:text-right font-bold table-header">
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2">
                                Parent/Guardian's
                                name</th>
                            <th class="whitespace-nowrap px-4 py-2">MyCard number
                            </th>
                            <th class="whitespace-nowrap px-4 py-2">Phone number
                            </th>
                            <th class="whitespace-nowrap px-4 py-2">Student's name
                            </th>
                            <th class="whitespace-nowrap px-4 py-2">Adult</th>
                            <th class="whitespace-nowrap px-4 py-2">Kid</th>
                            <th class="whitespace-nowrap px-4 py-2">Total</th>
                            <th class="px-4 py-2"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center divide-y divide-gray-200 font-thin input-text">
                        @php
                            $totalQuantity = 0;
                        @endphp
                        <!-- Record loop -->
                        @foreach ($attendances as $attendance)
                            <tr>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    {{ $attendance->full_name }}</td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    {{ $attendance->mycard_number }}</td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    {{ $attendance->phone_number }}</td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    @foreach ($attendance->students as $student)
                                        {{ $student->sname }}{{ $loop->last ? '' : ', ' }}<br>
                                    @endforeach
                                </td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    {{ 1 + $attendance->adults }}</td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    {{ $attendance->students()->count() + $attendance->kids }}</td>
                                <td class="whitespace-nowrap text-center px-4 py-2">
                                    {{ 1 + $attendance->students()->count() + $attendance->adults + $attendance->kids }}
                                </td>

                            </tr>
                            @php
                                $totalQuantity +=
                                    1 + $attendance->students()->count() + $attendance->adults + $attendance->kids;
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot class="font-bold input-name">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="whitespace-nowrap text-center px-4 py-2">
                                {{ $totalQuantity }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="flex items-center justify-end m-2 gap-4 pt-4">

            <a href="/post/{{ $post->id }}"
                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                Return
            </a>
        </div>
    </div>

</x-app-layout>
