@section('title', 'Join Event')
<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="bg-white shadow rounded-lg min-w-fit min-h-full mx-4 p-4 sm:py-8 sm:px-6 lg:px-8">
        <div class="border-b-2 border-indigo-300/50 pb-4"> <!-- straight grey line at the bottom -->
            <h2 class="font-semibold text-xl title-color leading-tight">
                {{ __('Join Event: ') }} {{ $post->title }}
            </h2>
        </div>

        <form action="{{ route('attendance.store', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="my-2 w-1/2">

                <input type="hidden" name="post" value="{{ $post->id }}">

                <input type="hidden" name="user" value="{{ auth()->user()->id }}">

                <!-- Full name -->
                <div class="sm:col-span-3">
                    <x-input-label for="full_name" class="block text-sm font-medium leading-6 input-name"
                        :value="__('Full name')" />
                    <x-text-input id="full_name"
                        class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                        type="text" name="full_name" :value="old('full_name', $user->first_name . ' ' . $user->last_name)" required autofocus autocomplete="full_name" />
                    <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                </div>

                <!-- MyCard number -->
                <div class="sm:col-span-3">
                    <x-input-label for="mycard_number" class="mt-2 block text-sm font-medium leading-6 input-name"
                        :value="__('MyKad number')" />
                    <x-text-input id="mycard_number"
                        class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                        type="text" name="mycard_number" :value="old('mycard_number', $user->mycard_number)" required autofocus
                        autocomplete="mycard_number" />
                    <x-input-error :messages="$errors->get('mycard_number')" class="mt-2" />
                </div>

                <!-- Phone number -->
                <div class="sm:col-span-3">
                    <x-input-label for="phone_number" class="mt-2 block text-sm font-medium leading-6 input-name"
                        :value="__('Phone number')" />
                    <x-text-input id="phone_number"
                        class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                        type="text" name="phone_number" :value="old('phone_number', $user->phone_number)" required autofocus
                        autocomplete="phone_number" />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>

                <!-- Student's name -->
<div class="sm:col-span-3">
    <x-input-label for="sname" class="mt-2 block text-sm font-medium leading-6 input-name"
        :value="__('Children names')" />
</div>

@foreach ($students as $index => $student)
    <div wire:ignore id="students-container">
        <div class="student-row">
            <input type="hidden" id="students[{{ $index }}][id]"
                name="students[{{ $index }}][id]" value="{{ $student->id }}">

            <div class="flex items-center">
                <x-text-input type="text" id="students[{{ $index }}][sname]"
                    name="students[{{ $index }}][sname]"
                    class="mt-1 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    :value="old('students.'. $index. '.sname', $student->sname)" required autofocus autocomplete="sname" />
                <button type="button"
                    class="remove-student-btn ml-2 text-red-600 hover:text-red-900 transition duration-300 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
                <x-input-error class="mt-2" :messages="$errors->get('sname')" />
            </div>

        </div>
    </div>
@endforeach

                <p class="mt-4 text-sm font-bold title-color">
                    {{ __('*Number of people attending other than stated students\' and parent\'s name above.') }}
                </p>

                <!-- Adults quantity -->
                <div class="sm:col-span-3">
                    <x-input-label for="adults" class="mt-2 block text-sm font-medium leading-6 input-name"
                        :value="__('Adults')" />
                    <x-text-input id="adults"
                        class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                        type="text" name="adults" min="0" value="0" />
                    <x-input-error :messages="$errors->get('adults')" class="mt-2" />
                </div>

                <!-- Kids quantity -->
                <div class="sm:col-span-3">
                    <x-input-label for="kids" class="mt-2 block text-sm font-medium leading-6 input-name"
                        :value="__('Kids')" />
                    <x-text-input id="kids"
                        class="mb-2 bg-transparent border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                        type="text" name="kids" min="0" value="0" />
                    <x-input-error :messages="$errors->get('kids')" class="mt-2" />
                </div>

                <script>
                    $(document).on('click', '.remove-student-btn', function() {
                        let studentRow = $(this).closest('.student-row');
                        studentRow.remove();
                    });
                </script>

            </div>
            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="/post/{{ $post->id }}"
                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                    Cancel
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Submit
                </button>
            </div>
        </form>
    </div>

</x-app-layout>
