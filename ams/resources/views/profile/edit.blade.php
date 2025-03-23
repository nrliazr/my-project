@section('title', 'Profile')

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="bg-white rounded-lg min-w-fit min-h-full space-y-6 mx-4 p-4 sm:py-8 sm:px-6 lg:px-8">
        @if (Auth::user()->userType != 'admin')
            <!-- Update personal information -->
            <div class="p-4 sm:p-8 bg-indigo-50 shadow sm:rounded-lg">
                <div> <!-- class="max-w-xl" -->
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update home address -->
            <div class="p-4 sm:p-8 bg-indigo-50 shadow sm:rounded-lg">
                <div> <!-- class="max-w-xl" -->
                    @include('profile.partials.update-home-address')
                </div>
            </div>

            <!-- Update student information -->
            <div class="p-4 sm:p-8 bg-indigo-50 shadow sm:rounded-lg">
                <div> <!-- class="max-w-xl" -->
                    @include('profile.partials.update-student-information')
                </div>
            </div>

            <!-- Update password -->
            <div class="p-4 sm:p-8 bg-indigo-50 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete account -->
            <div class="p-4 sm:p-8 bg-indigo-50 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        @else
            <div class="p-4 sm:p-8 bg-indigo-50 shadow sm:rounded-lg">
                <div> <!-- class="max-w-xl" -->
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>


            <!-- Upload QR Code -->
            <div class="p-4 sm:p-8 bg-indigo-50 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.upload-qr-code')
                </div>
            </div>

            <!-- Update password -->
            <div class="p-4 sm:p-8 bg-indigo-50 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete account -->
            <div class="p-4 sm:p-8 bg-indigo-50 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
