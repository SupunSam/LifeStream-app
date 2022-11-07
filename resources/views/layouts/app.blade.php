<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Page Styles -->
    @yield('pagestyles')

    <!-- Vite Styles & Scripts-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('pagecdns')
</head>

<body class="flex flex-col min-h-screen">

    <div class="flex flex-col h-screen">

        <!-- Body Section -->
        <header class="bg-white shadow h-25">
            <!-- Navigation Section -->
            @include('layouts.partials.navigation')

            <!-- Page Heading -->
            <div class="grid grid-cols-2 px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $header }}

                <!-- Cart -->
                {{-- @include('layouts.partials.cart') --}}
            </div>
        </header>

        <!-- Body Section -->
        <main class="flex-grow py-12 bg-gray-200">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-transparent">
                    <!-- Alerts -->
                    <x-alerts class="mb-4" :errors="$errors" />

                    @yield('content')

                </div>
            </div>
        </main>

        <!-- Footer section -->
        <footer class="p-10 h-25 footer bg-neutral text-neutral-content">
            @include('layouts.partials.footer')
        </footer>



    </div>

    {{-- Scripts --}}
    @yield('scripts')

</body>

</html>
