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
    <body class="bg-white antialiased">
        <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-50">
            <!-- Header -->
            <header class="relative z-50 w-full">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16 sm:h-20">
                        <!-- Logo -->
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="text-xl sm:text-2xl lg:text-3xl font-bold">
                                <span class="bg-gradient-to-r from-green-600 to-green-700 bg-clip-text text-transparent">
                                    CCPP
                                </span>
                            </div>
                        </div>
                        
                        <!-- Navigation -->
                        @if (Route::has('login'))
                            <nav class="flex items-center space-x-2 sm:space-x-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}" 
                                       class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}"
                                       class="inline-flex items-center px-3 sm:px-4 py-2 text-gray-700 hover:text-green-600 text-sm font-medium rounded-lg transition-colors duration-200">
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                           class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </div>
                </div>
            </header>

            <!-- Hero Section -->
            <main class="relative">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 sm:pt-20 pb-16 sm:pb-24">
                    <div class="text-center">
                        <!-- Hero Title -->
                        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight text-gray-900 leading-tight">
                            <span class="block">Carbon Credit</span>
                            <span class="block bg-gradient-to-r from-green-600 to-green-700 bg-clip-text text-transparent">
                                Price Prediction
                            </span>
                        </h1>
                        
                        <!-- Hero Subtitle -->
                        <p class="mt-6 max-w-2xl mx-auto text-lg sm:text-xl leading-8 text-gray-600">
                            Advanced machine learning solutions for accurate carbon credit price forecasting
                        </p>
                        
                        <!-- CTA Buttons -->
                        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6">
                            @auth
                                <a href="{{ url('/dashboard') }}" 
                                   class="inline-flex items-center px-6 sm:px-8 py-3 sm:py-4 bg-green-600 hover:bg-green-700 text-white text-base font-semibold rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl">
                                    Go to Dashboard
                                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            @else
                                <a href="{{ route('register') }}" 
                                   class="inline-flex items-center px-6 sm:px-8 py-3 sm:py-4 bg-green-600 hover:bg-green-700 text-white text-base font-semibold rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl">
                                    Get Started
                                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            @endauth
                            <a href="#learn-more" class="inline-flex items-center text-base font-semibold text-gray-700 hover:text-green-600 transition-colors duration-200">
                                Learn more
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Features Section -->
                <div id="learn-more" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16 sm:pb-24">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                        <!-- Feature 1 -->
                        <div class="group relative bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100 hover:shadow-lg hover:border-green-200 transition-all duration-300">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-green-200 transition-colors duration-300">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">Accurate Predictions</h3>
                            <p class="text-gray-600 leading-relaxed">State-of-the-art machine learning models for precise carbon credit price forecasting</p>
                        </div>
                        
                        <!-- Feature 2 -->
                        <div class="group relative bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100 hover:shadow-lg hover:border-green-200 transition-all duration-300">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-green-200 transition-colors duration-300">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">Real-time Data</h3>
                            <p class="text-gray-600 leading-relaxed">Live market data integration for up-to-the-minute price analysis</p>
                        </div>
                        
                        <!-- Feature 3 -->
                        <div class="group relative bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100 hover:shadow-lg hover:border-green-200 transition-all duration-300 md:col-span-2 lg:col-span-1">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-green-200 transition-colors duration-300">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">Market Insights</h3>
                            <p class="text-gray-600 leading-relaxed">Comprehensive market analysis and trend identification</p>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="border-t border-gray-100 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
                    <div class="text-center">
                        <div class="flex items-center justify-center space-x-3 mb-4">
                            <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="text-lg font-semibold bg-gradient-to-r from-green-600 to-green-700 bg-clip-text text-transparent">
                                Carbon Credit Price Prediction (CCPP)
                            </span>
                        </div>
                        <p class="text-sm text-gray-500">
                            &copy; {{ date('Y') }} CCPP. All rights reserved.
                        </p>
                    </div>
                </div>
            </footer>
        </div>

        <!-- Decorative Elements -->
        <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
            <div class="absolute top-20 right-10 w-72 h-72 bg-green-100 rounded-full opacity-20 blur-3xl"></div>
            <div class="absolute bottom-20 left-10 w-72 h-72 bg-green-200 rounded-full opacity-20 blur-3xl"></div>
        </div>
    </body>
</html>