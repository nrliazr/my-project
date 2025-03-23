<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/my-script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

</head>

<body class="font-sans antialiased login-background overflow-hidden" style="margin-top: 64px;">
    @include('layouts.navigation')
    <div class="h-screen justify-between border-e bg-white fixed transition width 0.3s ease-in-out hidden" id="side-menu">
        @include('layouts.side-menu')
    </div>

    <!-- Page Content -->
    <main class="login-background h-[calc(100vh-64px)] overflow-y-auto py-4" id="main-content">
        {{ $slot }}
    </main>

    <script>
        const sideMenu = document.querySelector('#side-menu');
        const mainContent = document.querySelector('#main-content');
        const toggleButton = document.querySelector('#toggle-button');

        toggleButton.addEventListener('click', () => {
            sideMenu.classList.toggle('hidden');
            sideMenu.classList.toggle('w-24');
            mainContent.classList.toggle('ml-24');
        });
    </script>
</body>

</html>
