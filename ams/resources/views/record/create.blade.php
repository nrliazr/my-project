@section('title', 'Update Record')

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="bg-white shadow rounded-lg min-w-fit min-h-full mx-4 p-4 sm:py-8 sm:px-6 lg:px-8">
        <div class="border-b-2 border-indigo-300/50 pb-4"> <!-- straight grey line at the bottom -->
            <h2 class="font-semibold text-xl title-color leading-tight">
                Update {{ \Carbon\Carbon::now()->format('d F Y') }} ({{ \Carbon\Carbon::now()->format('l') }})
                for {{ $student->sname }}
            </h2>
        </div>

        @if ($errors->any())
            <div role="alert" class="rounded border-s-4 border-red-500 bg-red-50 p-4">
                {{-- <ul> --}}
                @foreach ($errors->all() as $error)
                    <div class="flex items-center gap-2 text-red-800">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd"
                                d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                clip-rule="evenodd" />
                        </svg>

                        <strong class="block font-medium">{{ $error }}</strong>
                    </div>
                @endforeach
            </div>
        @endif

        <form action="/record" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="w-1/2 sm:justify-center sm:items-center">

                <input type="hidden" name="student" value="{{ $student->id }}">

                <select id="attendance"
                    class="mb-2 mt-4 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    type="text" name="attendance" autocomplete="attendance">
                    <option hidden>Did the student go to school today?</option>
                    <option value="Attend">Attend</option>
                    <option value="Not Attend">Not Attend</option>
                </select>

                <select id="sleepwell"
                    class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    type="text" name="sleepwell" autocomplete="sleepwell">
                    <option hidden>Did the student sleep well last night?</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>

                <select id="takebath"
                    class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    type="text" name="takebath" autocomplete="takebath">
                    <option hidden>Did the student take a bath today?</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>

                <select id="brushteeth"
                    class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    type="text" name="brushteeth" autocomplete="brushteeth">
                    <option hidden>Did the student brush their teeth today?</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>

                <select id="healthcondition"
                    class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    type="text" name="healthcondition" autocomplete="healthcondition">
                    <option hidden>Is the student feeling healthy today?</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="/records"
                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                    Cancel
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Update
                </button>
            </div>
        </form>

    </div>
</x-app-layout>
