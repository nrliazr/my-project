@section('title', 'Student\'s Daily Records')

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="bg-white shadow rounded-lg min-w-fit min-h-full mx-4 p-4 sm:py-8 sm:px-6 lg:px-8">
        <div class="border-b-2 border-indigo-300/50 pb-4"> <!-- straight grey line at the bottom -->
            <h2 class="font-semibold text-xl title-color leading-tight">
                {{ __('Students Records') }}
            </h2>
        </div>

        <div class="m-4">
            <!-- Add filter and search form -->
            <form action="{{ route('admin.records') }}" method="GET" class="mb-4">
                <div class="flex items-center">
                    <label for="class_of" class="text-sm font-medium input-name">Year:</label>
                    <select name="year" id="year"
                        class="inline-block border border-indigo-300 rounded w-20 px-4 mx-2 py-2 text-sm font-medium input-text placeholder:text-indigo-900 focus:relative">
                        <option value="">All</option>
                        @foreach ($years as $year)
                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                {{ $year }}</option>
                        @endforeach
                    </select>
                    <label for="search" class="text-sm font-medium input-name">Search:</label>
                    <input type="search" name="search" id="search" value="{{ request('search') }}"
                        class="inline-block border border-indigo-300 rounded w-2/6 px-4 mx-2 py-2 text-sm font-medium input-text placeholder:text-indigo-900 focus:relative"
                        placeholder="MyKid Number or Student Name">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>

                </div>
            </form>

            <div class="m-4 rounded-lg border border-gray-200">
                <div class="overflow-x-auto rounded-t-lg rounded-b-lg">
                    <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
                        <thead class="ltr:text-left rtl:text-right font-bold table-header">
                            <tr>
                                <th class="whitespace-nowrap px-4 py-2">No.</th>
                                <th class="whitespace-nowrap px-4 py-2">Student Name
                                </th>
                                <th class="whitespace-nowrap px-4 py-2">MyKid Number
                                </th>
                                <th class="whitespace-nowrap px-4 py-2">Birth Date
                                </th>
                                <th class="whitespace-nowrap px-4 py-2">Age</th>
                                <th class="whitespace-nowrap px-4 py-2">Gender</th>
                                <th class="whitespace-nowrap px-4 py-2">Class of</th>
                                <th class="whitespace-nowrap px-4 py-2">Attendance (%)</th>
                                <th class="whitespace-nowrap px-4 py-2">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="text-center divide-y divide-gray-200 font-thin">
                            <!-- Record loop -->
                            @foreach ($students as $student)
                                <tr>
                                    @if (!$student->hasUpdatedToday())
                                        <td class="whitespace-nowrap px-4 py-2 text-red-600">
                                            {{ $loop->index + 1 }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 text-red-600">
                                            {{ $student->sname }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 text-red-600">
                                            {{ $student->mykid_number }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 text-red-600">
                                            {{ date('d-m-Y', strtotime($student->sbirth_date)) }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 text-red-600">
                                            {{ $student->age }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 text-red-600">
                                            {{ $student->gender }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 text-red-600">
                                            {{ $student->class_of }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 text-red-600">
                                            {{ $student->attendance_percentage }}% </td>
                                        <td class="whitespace-nowrap px-4 py-2 text-red-600">
                                            <a
                                                class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                                    href="{{ route('record.show', $student->id) }}">
                                                View
                                            </a>
                                        </td>
                                    @else
                                        <td class="whitespace-nowrap px-4 py-2 input-text">
                                            {{ $loop->index + 1 }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 input-text">
                                            {{ $student->sname }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 input-text">
                                            {{ $student->mykid_number }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 input-text">
                                            {{ date('d-m-Y', strtotime($student->sbirth_date)) }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 input-text">
                                            {{ $student->age }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 input-text">
                                            {{ $student->gender }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 input-text">
                                            {{ $student->class_of }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 input-text">
                                            {{ $student->attendance_percentage }}% </td>
                                        <td class="whitespace-nowrap px-4 py-2 input-text">
                                            <a class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                                href="{{ route('record.show', $student->id) }}" title="View">
                                                View
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>

<!-- JavaScript code -->
<script>
    $(document).ready(function() {
        $('select[name="year"]').on('change', function() {
            $(this).closest('form').submit();
        });
    });
</script>
