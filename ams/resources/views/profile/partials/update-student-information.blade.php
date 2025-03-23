<section>
    <header>
        <h2 class="mt-2 text-lg font-bold title-color">
            {{ __('Children Information') }}
        </h2>

        <p class="mt-1 text-sm text-color">
            {{ __('Update your child information.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update.student.information') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="border-b border-gray-900/10 pb-4"> <!-- straight grey line -->
            <div class="overflow-x-auto rounded-t-lg rounded-b-lg border border-gray-200">
                <table id="students-container" class="min-w-full divide-y-2 divide-gray-200 text-sm"
                    style="table-layout: fixed;">
                    <thead class="ltr:text-left rtl:text-right bg-slate-100 font-bold table-header">
                        <tr>
                            <th hidden class="whitespace-nowrap border border-slate-300 px-4 py-2">
                                Student id</th>
                            <th class="whitespace-nowrap border border-slate-300 px-4 py-2">
                                No.
                            </th>
                            <th class="whitespace-nowrap border border-slate-300 px-4 py-2">
                                Student Name</th>
                            <th class="whitespace-nowrap border border-slate-300 px-4 py-2">
                                MyKid Number</th>
                            <th class="whitespace-nowrap border border-slate-300 px-4 py-2">
                                Birth Date</th>
                            <th class="whitespace-nowrap border border-slate-300 px-4 py-2">
                                Age</th>
                            <th class="whitespace-nowrap border border-slate-300 px-4 py-2">
                                Gender</th>
                            <th class="whitespace-nowrap border border-slate-300 px-4 py-2">
                                Year of Registration
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white rounded-b-lg">
                        @foreach ($students as $index => $student)
                            <tr class="student-row">
                                <td hidden class="border border-slate-300">
                                    <input type="hidden" id="students[{{ $index }}][id]"
                                        name="students[{{ $index }}][id]" value="{{ $student->id }}">
                                </td>
                                <td class="border border-slate-300 text-center input-text">
                                    {{ $loop->index + 1 }}
                                </td>
                                <td class="border border-slate-300">
                                    <x-text-input id="students[{{ $index }}][sname]"
                                        class="block w-full py-1.5 text-center input-text border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        type="text" name="students[{{ $index }}][sname]" :value="old('students.' . $index . '.sname', $student->sname)"
                                        required autofocus autocomplete="students[{{ $index }}][sname]" />
                                    <x-input-error :messages="$errors->get('sname')" class="mt-2" />
                                </td>
                                <td class="border border-slate-300">
                                    <x-text-input id="students[{{ $index }}][mykid_number]"
                                        class="block w-full py-1.5 text-center input-text border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        type="text" name="students[{{ $index }}][mykid_number]"
                                        :value="old('students.' . $index . '.mykid_number', $student->mykid_number)" readonly autofocus autocomplete="mykid_number" />
                                    <x-input-error :messages="$errors->get('mykid_number')" class="mt-2" />
                                </td>
                                <td class="border border-slate-300">
                                    <x-text-input id="students[{{ $index }}][sbirth_date]"
                                        class="block w-full py-1.5 input-text border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        type="date" name="students[{{ $index }}][sbirth_date]"
                                        :value="old('students.' . $index . '.sbirth_date', $student->sbirth_date)" required autofocus autocomplete="sbirth_date" />
                                    <x-input-error :messages="$errors->get('sbirth_date')" class="mt-2" />
                                </td>
                                <td class="border border-slate-300">
                                    <x-text-input id="students[{{ $index }}][age]" :value="__('Age')"
                                        class="block w-full py-1.5 text-center input-text border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        type="text" name="students[{{ $index }}][age]" :value="__('Age')"
                                        :value="old('students.' . $index . '.age', $student->age)" required autofocus autocomplete="age" />
                                    <x-input-error :messages="$errors->get('age')" class="mt-2" />
                                </td>
                                <td class="border border-slate-300">
                                    <select id="students[{{ $index }}][gender]"
                                        class="block w-full py-1.5 input-text border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        type="text" name="students[{{ $index }}][gender]" required autofocus
                                        autocomplete="gender">
                                        <option value="Male"
                                            {{ old('students.' . $index . '.gender', $student->gender) == 'Male' ? 'selected' : '' }}>
                                            Male</option>
                                        <option value="Female"
                                            {{ old('students.' . $index . '.gender', $student->gender) == 'Female' ? 'selected' : '' }}>
                                            Female</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                </td>
                                <td class="border border-slate-300">
                                    <x-text-input id="students[{{ $index }}][class_of]"
                                        class="block w-full py-1.5 text-center input-text border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        type="text" name="students[{{ $index }}][class_of]"
                                        :value="old('students.' . $index . '.class_of', $student->class_of)" readonly autofocus autocomplete="class_of" />
                                    <x-input-error :messages="$errors->get('class_of')" class="mt-2" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Add New Student -->
            <div>
                <button type="button" name="add-student-row" id="add-student-row" onclick="showAddStudent()"
                    class="inline-flex items-center mt-2 px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Add New
                </button>
            </div>

        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'student-information-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
            @if (session('error'))
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-red-600">{{ session('error') }}</p>
            @endif
        </div>
    </form>

<!-- Add the overlay element -->
<div id="overlay" class="fixed top-0 left-0 w-full h-full bg-gray-900 opacity-50" hidden></div>


    <!-- Add New Student Form -->
    <div hidden id="add-new-student-container"
    class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-1000 bg-white rounded-lg w-full md:w-1/2 lg:w-1/4 xl:w-1/4 2xl:w-1/4 shadow-md">
    <form method="post" action="{{ route('profile.store.student') }}" class="flex flex-col gap-4 pt-4">
            @csrf
            <div class="p-4">
                <div class="border-b-2 border-indigo-300/50 pb-4"> <!-- straight grey line at the bottom -->
                    <h2 class="font-semibold text-xl title-color leading-tight">
                        Add New Child
                    </h2>
                </div>
                <!-- First Name -->
                <x-input-label for="sname" class="mt-2 block text-sm font-medium leading-6 input-name"
                    :value="__('Student\'s name')" />
                <x-text-input id="sname"
                    class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    type="text" name="new_student[sname]" :value="old('sname')" required autofocus
                    autocomplete="sname" />
                <x-input-error :messages="$errors->get('sname')" class="mt-2" />

                <!-- Last Name -->
                <x-input-label for="mykid_number" class="block text-sm font-medium leading-6 input-name"
                    :value="__('MyKid Number')" />
                <x-text-input id="mykid_number"
                    class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    type="text" name="new_student[mykid_number]" :value="old('mykid_number')" required autofocus
                    autocomplete="mykid_number" />
                <x-input-error :messages="$errors->get('mykid_number')" class="mt-2" />

                <!-- MyCard Number -->
                <x-input-label for="sbirth_date" class="block text-sm font-medium leading-6 input-name"
                    :value="__('Birth Date')" />
                <x-text-input id="sbirth_date"
                    class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    type="date" name="new_student[sbirth_date]" :value="old('sbirth_date')" required autofocus
                    autocomplete="sbirth_date" />
                <x-input-error :messages="$errors->get('sbirth_date')" class="mt-2" />

                <!-- Phone Number -->
                <x-input-label for="age" class="block text-sm font-medium leading-6 input-name"
                    :value="__('Age')" />
                <x-text-input id="age"
                    class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    type="text" name="new_student[age]" :value="old('age')" required autofocus
                    autocomplete="age" />
                <x-input-error :messages="$errors->get('age')" class="mt-2" />

                <x-input-label for="age" class="block text-sm font-medium leading-6 input-name"
                    :value="__('Gender')" />
                <select id="gender"
                    class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    type="text" name="new_student[gender]" :value="old('gender')" required autofocus
                    autocomplete="gender">
                    <option hidden>Select gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />

                <x-input-label for="class_of" class="block text-sm font-medium leading-6 input-name"
                    :value="__('Year of Registration')" />
                <select id="class_of"
                    class="mb-2 bg-white border-1 border-indigo-300 input-text text-base rounded-lg placeholder:text-indigo-900 focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5"
                    type="text" name="new_student[class_of]" :value="old('class_of')" required autofocus
                    autocomplete="class_of">
                    <option hidden>Select year</option>
                </select>
                <x-input-error :messages="$errors->get('class_of')" class="mt-2" />
                <div class="flex items-center justify-center gap-4 pt-10">
                    <button type="button"
                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                        onclick="cancelPayment()">
                        Cancel
                    </button>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>

</section>

<script>
    const addNewStudentContainer = document.getElementById('add-new-student-container');
    const overlay = document.getElementById('overlay');
    const addNewStudentButton = document.getElementById('add-student-row');
    initializeDropdown(addNewStudentContainer); // Call the function here

    // Show the modal and overlay
    function showAddNewStudent() {
        addNewStudentContainer.hidden = false;
        overlay.hidden = false;
    }

    // Hide the modal and overlay
    function hideAddNewStudent() {
        addNewStudentContainer.hidden = true;
        overlay.hidden = true;
    }

    // Add event listener to overlay to close the modal
    overlay.addEventListener('click', hideAddNewStudent);

    // Add event listener to cancel button to close the modal
    document.querySelector('button[type="button"][onclick="cancelPayment()"]').addEventListener('click', hideAddNewStudent);

    // Add event listener to add new student button
    addNewStudentButton.addEventListener('click', showAddNewStudent);

    function initializeDropdown(container) {
        const startYear = 2020;
        const endYear = new Date().getFullYear();
        const years = Array.from({
            length: endYear - startYear + 1
        }, (_, i) => startYear + i);

        const dropdown = container.querySelector('#class_of');
        years.map((year) => {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            dropdown.appendChild(option);
        });
    }
</script>
