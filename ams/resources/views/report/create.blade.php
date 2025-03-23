<title>Report: {{ $report->title }}</title>

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="bg-white shadow rounded-lg min-w-fit min-h-full mx-4 p-4 sm:py-8 sm:px-6 lg:px-8">
        <div class="border-b-2 border-indigo-300/50 pb-4"> <!-- straight grey line at the bottom -->
            <h2 class="font-semibold text-xl title-color leading-tight">
                Report: {{ $report->title }}
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

        <form action="/report" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="post" value="{{ $post->id }}">

            <label for="title"
                class="relative block overflow-hidden bg-transparent pt-3 focus-within:border-blue-600 input-name"><b>Event
                    Name</b>
                <input type="text" name="title" id="title" value="{{ $report->title }}"
                    class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-gray-700 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    placeholder="Title" />
            </label>

            <label for="location"
                class="relative block overflow-hidden bg-transparent pt-3 focus-within:border-blue-600 input-name"><b>Location</b>
                <input type="text" name="location" id="location" value="{{ $report->location }}"
                    class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-gray-700 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    placeholder="Location" />
            </label>

            <div class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="time"
                        class="relative block overflow-hidden bg-transparent pt-3 focus-within:border-blue-600 input-name"><b>Time</b>
                        <input type="time" name="time" id="time" value="{{ $report->time }}"
                            class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-gray-700 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                            placeholder="Time" />
                    </label>
                </div>
                <div class="sm:col-span-3">
                    <label for="date"
                        class="relative block overflow-hidden bg-transparent pt-3 focus-within:border-blue-600 input-name"><b>Date</b>
                        <input type="date" name="date" id="date" value="{{ $report->date }}"
                            class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-gray-700 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                            placeholder="Date" />
                    </label>
                </div>
            </div>

            <label for="attendance"
                class="relative block overflow-hidden bg-transparent pt-3 focus-within:border-blue-600 input-name"><b>Attendance</b>
                <input type="text" name="attendance" id="attendance" value="{{ $post->getAttendanceSummary() }}"
                    class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-gray-700 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    placeholder="Attendance" />
            </label>

            <label for="description"
                class="relative block overflow-hidden bg-transparent pt-3 focus-within:border-blue-600 input-name"><b>Description</b></label>
            <div class="overflow-hidden">
                <textarea name="description" id="description"
                    class="mb-2 resize-none bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-gray-700 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    rows="20" placeholder="Description...">{{ $report->description }}</textarea>

            </div>

            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="/admin/reports"
                    class="inline-flex items-center px-4 py-2 bg-slate-200 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-300 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Cancel
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Create
                </button>
            </div>

        </form>
    </div>
</x-app-layout>
