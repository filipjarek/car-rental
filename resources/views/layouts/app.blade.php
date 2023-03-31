<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js',])
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <!-- Styles -->
        @livewireStyles
        
    </head>
    <body class="font-sans antialiased">

        <x-jet-banner />

        <div class="min-h-screen bg-slate-50 dark:bg-slate-800 dark:text-white">
            @livewire('navigation-menu')
            @include('sweetalert::alert')
            
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-slate-50 dark:bg-slate-800 ">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-">
                        {{ $header }}
                    </div>
                </header>
            @endif
            
            <!-- Page Content -->
            <main>
                {{ $slot }}
                @include('components/footer')
            </main>
        </div>

        @stack('modals')
        @livewireScripts
       
    </body>
</html>
