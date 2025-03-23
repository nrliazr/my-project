    @extends('layouts.registration')

    @section('title', '')

    @section('content')
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- First row ---------------------------------------------------------------------------------------------- -->
            <div class="border-b border-gray-900/10 py-2"> <!-- straight grey line at the bottom -->
                <h2 class="text-base font-semibold leading-7 title-color">Personal Information</h2>

                <!-- Layout? to be check -->
                <div class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-6">

                    <!-- First Name -->
                    <div class="sm:col-span-3">
                        <x-input-label for="first_name" class="block text-sm font-medium leading-6 input-name"
                            :value="__('First name')" />
                        <x-text-input id="first_name"
                            class="block w-full rounded-md border-0 py-1.5 input-text shadow-sm ring-1 ring-inset ring-indigo-300 placeholder:text-indigo-900 focus:ring-2 focus:ring-inset focus:ring-indigo-400 sm:text-sm sm:leading-6"
                            type="text" name="first_name" :value="old('first_name')" required autofocus
                            autocomplete="first_name" />
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>

                    <!-- Last Name -->
                    <div class="sm:col-span-3">
                        <x-input-label for="last_name" class="block text-sm font-medium leading-6 input-name"
                            :value="__('Last name')" />
                        <x-text-input id="last_name"
                            class="block w-full rounded-md border-0 py-1.5 input-text shadow-sm ring-1 ring-inset ring-indigo-300 placeholder:text-indigo-900 focus:ring-2 focus:ring-inset focus:ring-indigo-400 sm:text-sm sm:leading-6"
                            type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>

                    <!-- MyCard Number -->
                    <div class="sm:col-span-3">
                        <x-input-label for="mycard_number" class="block text-sm font-medium leading-6 input-name"
                            :value="__('MyKad number')" />
                        <x-text-input id="mycard_number"
                            class="block w-full rounded-md border-0 py-1.5 input-text shadow-sm ring-1 ring-inset ring-indigo-300 placeholder:text-indigo-900 focus:ring-2 focus:ring-inset focus:ring-indigo-400 sm:text-sm sm:leading-6"
                            type="text" name="mycard_number" :value="old('mycard_number')" required autofocus
                            autocomplete="mycard_number" />
                        <x-input-error :messages="$errors->get('mycard_number')" class="mt-2" />
                    </div>

                    <!-- Phone Number -->
                    <div class="sm:col-span-3">
                        <x-input-label for="phone_number" class="block text-sm font-medium leading-6 input-name"
                            :value="__('Phone number')" />
                        <x-text-input id="phone_number"
                            class="block w-full rounded-md border-0 py-1.5 input-text shadow-sm ring-1 ring-inset ring-indigo-300 placeholder:text-indigo-900 focus:ring-2 focus:ring-inset focus:ring-indigo-400 sm:text-sm sm:leading-6"
                            type="text" name="phone_number" :value="old('phone_number')" required autofocus
                            autocomplete="phone_number" />
                        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                    </div>
                </div>
            </div>

            <!-- Second row ---------------------------------------------------------------------------------------------- -->
            <div class="border-b border-gray-900/10 py-2"> <!-- straight grey line -->
                <h2 class="text-base font-semibold leading-7 title-color">Home Address</h2>

                <!-- Layout? to be check -->
                <div class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-6">
                    <!-- Address Line 1 -->
                    <div class="sm:col-span-3">
                        <x-input-label for="address_line1" class="block text-sm font-medium leading-6 input-name"
                            :value="__('Address line 1')" />
                        <x-text-input id="address_line1"
                            class="block w-full rounded-md border-0 py-1.5 input-text shadow-sm ring-1 ring-inset ring-indigo-300 placeholder:text-indigo-900 focus:ring-2 focus:ring-inset focus:ring-indigo-400 sm:text-sm sm:leading-6"
                            type="text" name="address_line1" :value="old('address_line1')" required autofocus
                            autocomplete="address_line1" />
                        <x-input-error :messages="$errors->get('address_line1')" class="mt-2" />
                    </div>

                    <!-- Address Line 2 -->
                    <div class="sm:col-span-3">
                        <x-input-label for="address_line2" class="block text-sm font-medium leading-6 input-name"
                            :value="__('Address line 2')" />
                        <x-text-input id="address_line2"
                            class="block w-full rounded-md border-0 py-1.5 input-text shadow-sm ring-1 ring-inset ring-indigo-300 placeholder:text-indigo-900 focus:ring-2 focus:ring-inset focus:ring-indigo-400 sm:text-sm sm:leading-6"
                            type="text" name="address_line2" :value="old('address_line2')" required autofocus
                            autocomplete="address_line2" />
                        <x-input-error :messages="$errors->get('address_line2')" class="mt-2" />
                    </div>

                    <!-- Post Code-->
                    <div class="sm:col-span-2 sm:col-start-1">
                        <x-input-label for="post_code" class="block text-sm font-medium leading-6 input-name"
                            :value="__('Post code')" />
                        <x-text-input id="post_code"
                            class="block w-full rounded-md border-0 py-1.5 input-text shadow-sm ring-1 ring-inset ring-indigo-300 placeholder:text-indigo-900 focus:ring-2 focus:ring-inset focus:ring-indigo-400 sm:text-sm sm:leading-6"
                            type="text" name="post_code" :value="old('post_code')" required autofocus
                            autocomplete="post_code" />
                        <x-input-error :messages="$errors->get('post_code')" class="mt-2" />
                    </div>

                    <!-- State-->
                    <div class="sm:col-span-2">
                        <x-input-label for="state" class="block text-sm font-medium leading-6 input-name"
                            :value="__('State')" />
                        <select id="state" name="state"
                            class="block w-full rounded-md border-0 py-1.5 input-text shadow-sm ring-1 ring-inset ring-indigo-300 placeholder:text-indigo-900 focus:ring-2 focus:ring-inset focus:ring-indigo-400 sm:text-sm sm:leading-6"
                            required onchange="getDistricts(this.value)">
                            <option hidden value="">Select a state</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('state')" class="mt-2" />
                    </div>

                    <!-- District-->
                    <div class="sm:col-span-2">
                        <x-input-label for="district" class="block text-sm font-medium leading-6 input-name"
                            :value="__('District')" />
                        <select id="district" name="district"
                            class="block w-full rounded-md border-0 py-1.5 input-text shadow-sm ring-1 ring-inset ring-indigo-300 placeholder:text-indigo-900 focus:ring-2 focus:ring-inset focus:ring-indigo-400 sm:text-sm sm:leading-6"
                            required>
                            <option value="">Select a state</option>
                        </select>
                        <x-input-error :messages="$errors->get('district')" class="mt-2" />
                    </div>
                </div>
            </div>

            <!-- Student fields ---------------------------------------------------------------------------------------------- -->
            <div class="border-b border-gray-900/10 py-2"> <!-- straight grey line -->
                <h2 class="text-base font-semibold leading-7 title-color">Children Information</h2>

                <div class="my-2 overflow-x-auto rounded-lg border border-gray-200">
                    <table id="students-container" class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm"
                        style="table-layout: fixed;">
                        <thead class="ltr:text-left rtl:text-right font-medium table-header">
                            <tr>
                                <th class="whitespace-nowrap border border-slate-300 px-4 py-2">
                                    Child Name</th>
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
                                <th class="whitespace-nowrap border border-slate-300 px-4 py-2">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="student-row">
                                <td class="border border-slate-300">
                                    <x-text-input id="sname"
                                        class="block w-full py-1.5 text-center input-text border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        type="text" name="students[0][sname]" :value="old('sname')" required autofocus
                                        autocomplete="sname" />
                                    <x-input-error :messages="$errors->get('sname')" class="mt-2" />
                                </td>
                                <td class="border border-slate-300">
                                    <x-text-input id="mykid_number"
                                        class="block w-full py-1.5 text-center input-text border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        type="text" name="students[0][mykid_number]" :value="old('mykid_number')" required
                                        autofocus autocomplete="mykid_number" />
                                    <x-input-error :messages="$errors->get('mykid_number')" class="mt-2" />
                                </td>
                                <td class="border border-slate-300">
                                    <x-text-input id="sbirth_date"
                                        class="block w-full py-1.5 text-center input-text border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        type="date" name="students[0][sbirth_date]" :value="old('sbirth_date')" required
                                        autofocus autocomplete="sbirth_date" />
                                    <x-input-error :messages="$errors->get('sbirth_date')" class="mt-2" />
                                </td>
                                <td class="border border-slate-300">
                                    <x-text-input id="age"
                                        class="block w-full py-1.5 text-center input-text border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        type="text" name="students[0][age]" :value="old('age')" required autofocus
                                        autocomplete="age" />
                                    <x-input-error :messages="$errors->get('age')" class="mt-2" />
                                </td>
                                <td class="border border-slate-300">
                                    <select id="gender"
                                        class="block w-full py-1.5 text-center input-text border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        type="text" name="students[0][gender]" :value="old('gender')" required
                                        autofocus autocomplete="gender">
                                        <option hidden>Select gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                </td>
                                <td class="border border-slate-300">
                                    <select id="class_of"
                                        class="block w-full py-1.5 text-center input-text border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        type="text" name="students[0][class_of]" :value="old('class_of')" required
                                        autofocus autocomplete="class_of">
                                        <option hidden>Select year</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('class_of')" class="mt-2" />
                                </td>
                                <td class="border border-slate-300">
                                    <button type="button" name="add-student-row" id="add-student-row"
                                        class="block w-full border-0 px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-500 focus:relative btn btn-success">Add
                                        more</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Fourth row ---------------------------------------------------------------------------------------------- -->
            <div class="border-b border-gray-900/10 py-2"> <!-- straight grey line -->
                <h2 class="text-base font-semibold leading-7 title-color">Login Information</h2>

                <!-- Layout? to be check -->
                <div class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-6">
                    <!-- Email Address -->
                    <div class="sm:col-span-3 sm:col-start-1">
                        <x-input-label for="email" class="block text-sm font-medium leading-6 input-name"
                            :value="__('Email address')" />
                        <x-text-input id="email"
                            class="block w-full rounded-md border-0 py-1.5 input-text shadow-sm ring-1 ring-inset ring-indigo-300 placeholder:text-indigo-900 focus:ring-2 focus:ring-inset focus:ring-indigo-400 sm:text-sm sm:leading-6"
                            type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="sm:col-span-3 sm:col-start-1">
                        <x-input-label for="password" class="block text-sm font-medium leading-6 input-name"
                            :value="__('Password')" />
                        <x-text-input id="password"
                            class="block w-full rounded-md border-0 py-1.5 input-text shadow-sm ring-1 ring-inset ring-indigo-300 placeholder:text-indigo-900 focus:ring-2 focus:ring-inset focus:ring-indigo-400 sm:text-sm sm:leading-6"
                            type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Password Confirmation -->
                    <div class="sm:col-span-3 sm:col-start-1">
                        <x-input-label for="password_confirmation" class="block text-sm font-medium leading-6 input-name"
                            :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation"
                            class="block w-full rounded-md border-0 py-1.5 input-text shadow-sm ring-1 ring-inset ring-indigo-300 placeholder:text-indigo-900 focus:ring-2 focus:ring-inset focus:ring-indigo-400 sm:text-sm sm:leading-6"
                            type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>
            </div>

            <!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <!-- Register button -->
            <x-primary-button
                class="justify-center block w-full rounded-lg bg-black px-5 py-3 mt-4 text-sm font-medium text-white">
                {{ __('Register') }}
            </x-primary-button>

            <!-- Return to login -->
            <div class="text-center text-sm text-gray-500 mt-4">
                Already have an account?
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Login') }}
                </a>
            </div>
        </form>

        <script>
            let studentCount = 1;

            function getDistricts(stateId) {
                // Send an AJAX request to the server to get the list of districts for the selected state
                axios.get('{{ route('get-districts', ':stateId') }}'.replace(':stateId', stateId))
                    .then(response => {
                        // Clear the current options in the district select element
                        document.getElementById('district').innerHTML = '';

                        // Add a new option for "Select a district"
                        let districtSelect = document.getElementById('district');
                        let option = document.createElement('option');
                        option.value = '';
                        option.text = 'Select a district';
                        districtSelect.add(option);

                        // Add a new option for each district in the response
                        response.data.forEach(district => {
                            option = document.createElement('option');
                            option.value = district.id;
                            option.text = district.name;
                            districtSelect.add(option);
                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }

            function initializeDropdown(row) {
                const startYear = 2000;
                const endYear = new Date().getFullYear();
                const years = Array.from({
                    length: endYear - startYear + 1
                }, (_, i) => startYear + i);

                const dropdown = row.querySelector('#class_of');
                years.map((year) => {
                    const option = document.createElement('option');
                    option.value = year;
                    option.textContent = year;
                    dropdown.appendChild(option);
                });
            }

            $(document).ready(function() {
                // Initialize the dropdown for each existing row
                $('.student-row').each(function() {
                    initializeDropdown(this);
                });

                var studentCount = 1;

                $("#add-student-row").click(function() {
                    studentCount++;
                    var newStudentRow = `
                        <tr class="student-row">
                            <td class="border border-slate-300">
                                <x-text-input id="sname"
                                class="block w-full py-1.5 text-center text-gray-900 border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    type="text" name="students[${studentCount}][sname]" :value="old('sname')" required autofocus
                                    autocomplete="sname" />
                                <x-input-error :messages="$errors->get('sname')" class="mt-2" />
                            </td>
                            <td class="border border-slate-300">
                                <x-text-input id="mykid_number"
                                class="block w-full py-1.5 text-center text-gray-900 border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    type="text" name="students[${studentCount}][mykid_number]" :value="old('mykid_number')" required
                                    autofocus autocomplete="mykid_number" />
                                <x-input-error :messages="$errors->get('mykid_number')" class="mt-2" />
                            </td>
                            <td class="border border-slate-300">
                                <x-text-input id="sbirth_date"
                                class="block w-full py-1.5 text-gray-900 border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    type="date" name="students[${studentCount}][sbirth_date]" :value="old('sbirth_date')" required
                                    autofocus autocomplete="sbirth_date" />
                                <x-input-error :messages="$errors->get('sbirth_date')" class="mt-2" />
                            </td>
                            <td class="border border-slate-300">
                                <x-text-input id="age"
                                class="block w-full py-1.5 text-center text-gray-900 border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    type="text" name="students[${studentCount}][age]" :value="old('age')" required autofocus
                                    autocomplete="age" />
                                <x-input-error :messages="$errors->get('age')" class="mt-2" />
                            </td>
                            <td class="border border-slate-300">
                                <select id="gender"
                                class="block w-full py-1.5 text-center text-gray-900 border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    type="text" name="students[${studentCount}][gender]" :value="old('gender')" required
                                    autofocus autocomplete="gender">
                                    <option hidden>Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                            </td>
                            <td class="border border-slate-300">
                                <select id="class_of"
                                class="block w-full py-1.5 text-center text-gray-900 border-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    type="text" name="students[${studentCount}][class_of]" :value="old('class_of')" required
                                    autofocus autocomplete="class_of">
                                    <option hidden>Select year</option>
                                </select>
                                <x-input-error :messages="$errors->get('class_of')" class="mt-2" />
                            </td>
                            <td class="border border-slate-300">
                                <button type="button" class="block w-full border-0 px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-400 focus:relative btn btn-success remove-student-row">Remove</button>
                            </td>
                        </tr>
                    `;
                    $("#students-container").append(newStudentRow);

                    // Initialize the dropdown for the new row
                    initializeDropdown($('.student-row').last()[0]);
                });

                // Remove a row when the "Remove" button is clicked
                $("#students-container").on("click", ".remove-student-row", function() {
                    $(this).closest(".student-row").remove();
                });
            });
        </script>
    @endsection
