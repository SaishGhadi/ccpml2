<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Carbon Credit Price Prediction') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
        </style>
    </head>
    <body class="bg-gray-50 antialiased">
        <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow-sm border-b border-gray-100">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 text-center">
                            <span class="bg-gradient-to-r from-green-600 to-green-700 bg-clip-text text-transparent">
                                {{ $header }}
                            </span>
                        </h1>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 lg:py-12">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                        <!-- Content Card -->
                        <div class="p-6 sm:p-8 lg:p-10">
                            <div class="text-gray-900">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer (optional) -->
            <footer class="bg-white border-t border-gray-100 mt-auto">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                    <div class="text-center text-sm text-gray-500">
                        <p>&copy; {{ date('Y') }} CCPP. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>