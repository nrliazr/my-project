<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Create New Account @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="font-sans login-background antialiased overflow-y-auto">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">


        <div class="w-11/12 h-fit my-6 px-6 py-4 rounded-lg bg-white shadow-md sm:rounded-lg">

            <!-- Project name -->
            <div class="border-b-2 border-indigo-300/50 py-2"> <!-- straight grey line at the bottom -->
                <h1 class="text-xl font-extrabold text-center title-color">Create New Account</h1>
            </div>
            <!-- Content -->
            @yield('content')
        </div>
    </div>
</body>

</html>
