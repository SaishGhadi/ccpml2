<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-[#0C8A6F] dark:text-[#0C8A6F] leading-tight text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex items-center justify-center bg-gray-50 dark:bg-black text-black/50 dark:text-white/50">
        <div class="w-full max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-800 shadow-xl rounded-2xl p-8 space-y-6">

                <!-- Title -->
                <h2 class="text-2xl sm:text-3xl font-bold text-center text-[#0C8A6F] dark:text-[#0C8A6F]">
                    Carbon Credit Price Predictor
                </h2>

                <!-- Prediction Form -->
                <form id="predictionForm" method="POST" action="{{ route('predict') }}" class="space-y-6">
                    @csrf

                    <!-- Date Display -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-center gap-3 text-gray-700 dark:text-white text-base text-center">
                        <span>Current Date:</span>

                        <div class="relative inline-block group">
                            <div class="w-6 h-6 flex items-center justify-center rounded-full bg-gray-200 dark:bg-gray-700 text-sm font-semibold text-gray-700 dark:text-white cursor-pointer group-hover:bg-white transition">
                                i
                                <span class="absolute z-10 top-full left-1/2 transform -translate-x-1/2 mt-2 hidden group-hover:block w-72 p-3 text-sm text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                                    Today's <strong>date</strong> is used to extract Month and Year for prediction.
                                </span>
                            </div>
                        </div>

                        <span class="inline-block w-fit px-4 py-2 rounded bg-gray-100 dark:bg-zinc-700 text-black dark:text-white font-medium">
                            {{ now()->format('d-m-Y') }}
                        </span>
                    </div>

                    <!-- GHG Input -->
                    <div class="flex justify-center">
                        <input
                            type="number"
                            step="0.01"
                            name="G"
                            required
                            placeholder="Global GHG Covered (%)"
                            class="w-full max-w-xs p-3 border rounded-lg bg-gray-100 dark:bg-zinc-700 text-black dark:text-white focus:outline-none focus:ring-2 focus:ring-[#0C8A6F]"
                        />
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button
                            type="submit"
                            class="bg-[#0C8A6F] text-white px-6 py-2 rounded-lg hover:bg-[#0C8A6F]/80 transition duration-150">
                            Predict Carbon Price
                        </button>
                    </div>
                </form>

                <!-- Result Display -->
                @if(session('result'))
                    <div class="text-center text-lg font-semibold text-green-600 dark:text-green-400">
                        Predicted Carbon Price: ₹{{ number_format(session('result'), 2) }}
                    </div>
                @endif

                <!-- Error Display -->
                @if($errors->any())
                    <div class="text-center text-red-500 font-medium">
                        {{ $errors->first() }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
