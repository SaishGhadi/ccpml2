<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Carbon Credit Price Prediction') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#0C8A6F] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="fixed top-0 z-50 w-full grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex ">
                            <div class="text-3xl font-bold text-[#0C8A6F] dark:text-[#0C8A6F]">CCPP</div>
                        </div>
                        
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a href="{{ url('/dashboard') }}" 
                                       class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#0C8A6F] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}"
                                       class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#0C8A6F] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                           class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#0C8A6F] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main class="mt-6">
                        <div class="text-center">
                            <h1 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-6xl">
                                Carbon Credit Price Prediction
                            </h1>
                            <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">
                                Advanced machine learning solutions for accurate carbon credit price forecasting
                            </p>
                            <div class="mt-10 flex items-center justify-center gap-x-6">
                                @auth
                                    <a href="{{ url('/dashboard') }}" 
                                       class="rounded-md bg-[#0C8A6F] px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#0C8A6F]/80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#0C8A6F]">
                                        Go to Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('register') }}" 
                                       class="rounded-md bg-[#0C8A6F] px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#0C8A6F]/80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#0C8A6F]">
                                        Get Started
                                    </a>
                                @endauth
                                <a href="#learn-more" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">
                                    Learn more <span aria-hidden="true">→</span>
                                </a>
                            </div>
                        </div>

                        <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                            <div class="rounded-lg bg-white p-6 shadow-lg dark:bg-zinc-800">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Accurate Predictions</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-300">State-of-the-art machine learning models for precise carbon credit price forecasting</p>
                            </div>
                            <div class="rounded-lg bg-white p-6 shadow-lg dark:bg-zinc-800">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Real-time Data</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-300">Live market data integration for up-to-the-minute price analysis</p>
                            </div>
                            <div class="rounded-lg bg-white p-6 shadow-lg dark:bg-zinc-800">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Market Insights</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-300">Comprehensive market analysis and trend identification</p>
                            </div>
                        </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Carbon Credit Price Prediction (CCPP)
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>