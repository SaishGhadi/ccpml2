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

<body class="bg-gradient-to-br from-gray-50 to-gray-100 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center px-4 py-6 sm:px-6 lg:px-8">
        <!-- Logo Section -->
        <div class="mb-8 text-center">
            <a href="/" class="inline-block">
                <div class="flex items-center justify-center space-x-3">
                    <!-- <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div> -->
                    <div class="text-2xl sm:text-3xl font-bold text-gray-900">
                        <span class="bg-gradient-to-r from-green-600 to-green-700 bg-clip-text text-transparent">
                            CCPP
                        </span>
                    </div>
                </div>
            </a>
            <p class="mt-2 text-sm text-gray-600">Carbon Credit Price Prediction</p>
        </div>

        <!-- Login Card -->
        <div class="w-full max-w-md">
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-6 sm:px-8">
                    <h2 class="text-2xl font-bold text-center text-white">
                        Welcome Back
                    </h2>
                    <p class="text-green-100 text-center mt-1 text-sm">
                        Sign in to your account
                    </p>
                </div>

                <!-- Card Body -->
                <div class="px-6 py-8 sm:px-8">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')"
                                class="block text-sm font-medium text-gray-700 mb-2" />
                            <x-text-input id="email"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                                type="email" name="email" :value="old('email')" required autofocus
                                autocomplete="username" placeholder="Enter your email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Password')"
                                class="block text-sm font-medium text-gray-700 mb-2" />
                            <x-text-input id="password"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                                type="password" name="password" required autocomplete="current-password"
                                placeholder="Enter your password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 focus:ring-2"
                                name="remember">
                            <label for="remember_me" class="ml-2 text-sm text-gray-600">
                                {{ __('Remember me') }}
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200">
                                {{ __('Sign In') }}
                            </button>
                        </div>
                    </form>

                    <!-- Links -->
                    <div class="mt-6 space-y-3">
                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a href="{{ route('password.request') }}"
                                    class="text-sm text-green-600 hover:text-green-700 font-medium transition-colors duration-200">
                                    {{ __('Forgot your password?') }}
                                </a>
                            </div>
                        @endif

                        <div class="text-center">
                            <span class="text-sm text-gray-600">Don't have an account? </span>
                            <a href="{{ route('register') }}"
                                class="text-sm text-green-600 hover:text-green-700 font-medium transition-colors duration-200">
                                {{ __('Sign up') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back to Home -->
            <div class="mt-6 text-center">
                <a href="/"
                    class="inline-flex items-center text-sm text-gray-600 hover:text-green-600 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Home
                </a>
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