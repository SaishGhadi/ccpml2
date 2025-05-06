<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-800 dark:bg-black dark:text-white/70">

    <div class="min-h-screen flex flex-col">

        {{-- Navigation --}}
        @include('admin.adminNav')

        {{-- Header --}}
        @isset($header)
            <header class="bg-white dark:bg-gray-900 shadow-md border-b border-gray-200 dark:border-gray-700">
                <div class="container mx-auto py-6 px-4 text-center">
                    <h1 class="text-3xl font-bold text-[#0C8A6F] dark:text-[#0C8A6F]">
                        {{ $header }}
                    </h1>
                </div>
            </header>
        @endisset

        {{-- Main Content --}}
        <main class="flex-grow">
            <div class="container mx-auto py-10 px-4">

                {{-- Welcome Message --}}
                <div class="text-center mb-10">
                    <h2 class="text-2xl font-semibold">Welcome, Admin!</h2>
                </div>

                {{-- Admin Form Card --}}
                <div class="max-w-3xl mx-auto bg-white dark:bg-zinc-800 shadow-xl rounded-2xl p-8">
                    <h3 class="text-2xl font-bold text-center text-[#0C8A6F] mb-8">
                        Admin Settings / Input Form
                    </h3>

                    {{-- Success Alert --}}
                    @if (session('success'))
                        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Form --}}
                    <form method="POST" action="{{ route('admin.storeFeatures') }}" class="space-y-6">
                        @csrf

                        {{-- Jurisdictions --}}
                        <div>
                            <input type="number" name="jurisdictions" required
                                placeholder="Number of Jurisdictions"
                                class="w-full p-3 border rounded-lg bg-gray-100 dark:bg-zinc-700 text-black dark:text-white focus:outline-none focus:ring-2 focus:ring-[#0C8A6F]" />
                        </div>

                        {{-- Carbon Price Index --}}
                        <div>
                            <input type="number" step="any" name="carbon_index" required
                                placeholder="Physical Carbon Price Index"
                                class="w-full p-3 border rounded-lg bg-gray-100 dark:bg-zinc-700 text-black dark:text-white focus:outline-none focus:ring-2 focus:ring-[#0C8A6F]" />
                        </div>

                        {{-- Dispersion --}}
                        <div>
                            <input type="number" step="any" name="dispersion" required
                                placeholder="Index of Dispersion"
                                class="w-full p-3 border rounded-lg bg-gray-100 dark:bg-zinc-700 text-black dark:text-white focus:outline-none focus:ring-2 focus:ring-[#0C8A6F]" />
                        </div>

                        {{-- Date Display --}}
                        <div class="text-center">
                            <label class="flex flex-col items-center space-y-2 text-gray-700 dark:text-white">
                                <span>Current Date:</span>
                                <span
                                    class="w-40 text-center p-2 border rounded bg-gray-100 dark:bg-zinc-700 text-black dark:text-white">
                                    {{ now()->format('d-m-Y') }}
                                </span>
                            </label>
                        </div>

                        {{-- Submit Button --}}
                        <div class="text-center mt-6">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition duration-200">
                                Save Settings
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </main>

    </div>

</body>

</html>
