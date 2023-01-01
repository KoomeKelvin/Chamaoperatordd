<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
       
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-6">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}

            </main>
            <div class="p-2 md:p-10">
               <p class="text-gray-600 text-md text-sm  md:text-lg flex justify-center"> Chamaoperator | All rights reserved </p> 
               <p class="text-gray-400 flex justify-center text-xs md:text-sm"> Support the creators for server fees through paybill<span class="text-gray-600 px-1"> 522522 </span> Acct No: <span class="text-gray-600 px-1"> 1156182093 </span></p>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
