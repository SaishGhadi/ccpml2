<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

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
    <body class="bg-gradient-to-br from-gray-50 to-gray-100 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center px-4 py-6 sm:px-6 lg:px-8">
            <!-- Logo Section -->
            <div class="mb-8 text-center">
                <a href="/" class="inline-block">
                    <div class="flex items-center justify-center space-x-3">
                        <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="text-2xl sm:text-3xl font-bold text-gray-900">
                            <span class="bg-gradient-to-r from-green-600 to-green-700 bg-clip-text text-transparent">
                                CCPP
                            </span>
                        </div>
                    </div>
                </a>
                <p class="mt-2 text-sm text-gray-600">Carbon Credit Price Prediction</p>
            </div>

            <!-- Main Content Card -->
            <div class="w-full max-w-md">
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="px-6 py-8 sm:px-8">
                        {{ $slot }}
                    </div>
                </div>
                
                <!-- Additional Info -->
                <div class="mt-6 text-center">
                    <p class="text-xs text-gray-500">
                        Secure and reliable carbon credit analytics
                    </p>
                </div>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-green-100 rounded-full opacity-20 blur-xl"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-green-200 rounded-full opacity-20 blur-xl"></div>
        </div>
    </body>
</html>