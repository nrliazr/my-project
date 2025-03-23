@section('title', 'Create a Post')

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="bg-white shadow rounded-lg min-w-fit min-h-full mx-4 p-4 sm:py-8 sm:px-6 lg:px-8">
        <div class="border-b-2 border-indigo-300/50 pb-4"> <!-- straight grey line at the bottom -->
            <h2 class="font-semibold text-xl title-color leading-tight">
                {{ __('Create a post') }}
            </h2>
        </div>

        @if ($errors->any())
            <div role="alert" class="rounded border-s-4 border-red-500 bg-red-50 p-4">
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

        <form action="/post" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" name="title" id="title"
                class="my-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                placeholder="Title" />

            <input type="text" name="location" id="location"
                class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                placeholder="Location" />

            <div class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <input type="time" name="time" id="time"
                        class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                        placeholder="Time" />
                </div>
                <div class="sm:col-span-3">
                    <input type="date" name="date" id="date"
                        class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                        placeholder="Date" />
                </div>
            </div>
            <textarea name="description" id="description"
                class="mb-2 resize-none bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                placeholder="Description" rows="10"></textarea>

            <input type="file" name="image"
                class="p-8 text-sm rounded-md border-dashed border-2 bg-transparent border-indigo-300 font-medium input-text hover:text-blue-900 cursor-pointer focus:ring-indigo-400 focus:border-indigo-400 block w-full" />

            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="/admin/home"
                    class="inline-flex items-center px-4 py-2 bg-slate-200 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-300 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Cancel
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Post
                </button>
            </div>

        </form>
    </div>
</x-app-layout>
