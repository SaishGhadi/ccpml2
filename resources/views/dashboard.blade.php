<x-app-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-8">
        <!-- Welcome Card -->
        <div class="bg-gradient-to-r from-green-50 to-green-100 rounded-xl p-6 sm:p-8 border border-green-200">
            <div class="flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-green-800">
                        Welcome, {{ Auth::user()->name }}!
                    </h2>
                    <p class="text-green-700 mt-1">
                        Predict carbon credit prices with advanced ML models
                    </p>
                </div>
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Prediction Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 sm:px-8 py-6">
                <h2 class="text-xl sm:text-2xl font-bold text-white text-center">
                    Carbon Credit Price Predictor
                </h2>
                <p class="text-green-100 text-center mt-2">
                    Enter GHG coverage data to get price predictions
                </p>
            </div>

            <!-- Card Body -->
            <div class="p-6 sm:p-8 space-y-8">
                <!-- Current Date Display -->
                <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4 text-gray-700">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="font-medium">Current Date:</span>
                        </div>

                        <div class="relative group">
                            <button
                                class="w-6 h-6 bg-green-100 hover:bg-green-200 rounded-full flex items-center justify-center text-xs font-semibold text-green-700 transition-colors duration-200 cursor-help">
                                i
                            </button>
                            <div
                                class="absolute z-10 top-full left-1/2 transform -translate-x-1/2 mt-2 hidden group-hover:block w-72 p-4 text-sm text-gray-700 bg-white rounded-lg shadow-lg border border-gray-200">
                                <p class="font-medium text-green-700 mb-1">Date Information</p>
                                <p>Today's date is used to extract Month and Year for the prediction model.</p>
                            </div>
                        </div>

                        <div class="px-4 py-2 bg-white rounded-lg border border-gray-200 font-mono text-sm">
                            {{ now()->format('d-m-Y') }}
                        </div>
                    </div>
                </div>

                <!-- Prediction Form -->
                <form id="predictionForm" method="POST" action="{{ route('predict') }}" class="space-y-6">
                    @csrf

                    <!-- Input Section -->
                    <div class="space-y-4">
                        <label for="ghg-input" class="block text-sm font-medium text-gray-700 text-center">
                            Global GHG Covered (%)
                        </label>
                        <div class="flex justify-center">
                            <div class="relative w-full max-w-sm">
                                <input id="ghg-input" type="number" step="0.01" name="G" required
                                    placeholder="Enter percentage (e.g., 25.5)"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 text-center" />
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 text-sm">%</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-xs text-gray-600 text-center">
                            Enter the percentage of global greenhouse gas emissions covered
                        </p>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit"
                            class="inline-flex items-center px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Predict Carbon Price
                        </button>
                    </div>
                </form>

                <!-- Results Section -->
                @if(session('result'))
                    <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-green-800 mb-2">Prediction Result</h3>
                            <p class="text-3xl font-bold text-green-700">
                                ${{ number_format(session('result'), 2) }}
                            </p>
                            <p class="text-sm text-green-600 mt-2">
                                Predicted carbon credit price per ton
                            </p>
                        </div>
                    </div>
                @endif

                <!-- Error Display -->
                @if($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-red-700 font-medium">
                                {{ $errors->first() }}
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Popular Searches Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <!-- Section Header -->
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 sm:px-8 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Popular Searches</h3>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        Trending
                    </div>
                </div>
            </div>

            <!-- Popular Search Items -->
<!-- Suggested GHG Values Section -->
<div class="p-6 sm:p-8">
    <div class="mb-6 text-center">
        <h4 class="text-base font-semibold text-gray-900 mb-2">Suggested GHG Coverage Values</h4>
        <p class="text-sm text-gray-600">Click any value to quickly fill the prediction form</p>
    </div>
    
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Low Coverage -->
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200 rounded-xl shadow-sm border border-blue-200 hover:border-blue-300 p-4 cursor-pointer transition-all duration-200 group" onclick="fillGHGValue(15.5)">
            <div class="text-center">
                <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center mx-auto mb-2 group-hover:bg-blue-600 transition-colors">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                    </svg>
                </div>
                <p class="text-xs font-medium text-gray-600 mb-1">Low Coverage</p>
                <p class="text-xl font-bold text-blue-600 group-hover:text-blue-700">15.5%</p>
                <p class="text-xs text-blue-500 mt-1">Developing Markets</p>
            </div>
        </div>

        <!-- Medium Coverage -->
        <div class="bg-gradient-to-br from-green-50 to-green-100 hover:from-green-100 hover:to-green-200 rounded-xl shadow-sm border border-green-200 hover:border-green-300 p-4 cursor-pointer transition-all duration-200 group" onclick="fillGHGValue(35.0)">
            <div class="text-center">
                <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center mx-auto mb-2 group-hover:bg-green-600 transition-colors">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <p class="text-xs font-medium text-gray-600 mb-1">Medium Coverage</p>
                <p class="text-xl font-bold text-green-600 group-hover:text-green-700">35.0%</p>
                <p class="text-xs text-green-500 mt-1">Regional Markets</p>
            </div>
        </div>

        <!-- High Coverage -->
        <div class="bg-gradient-to-br from-orange-50 to-orange-100 hover:from-orange-100 hover:to-orange-200 rounded-xl shadow-sm border border-orange-200 hover:border-orange-300 p-4 cursor-pointer transition-all duration-200 group" onclick="fillGHGValue(55.8)">
            <div class="text-center">
                <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center mx-auto mb-2 group-hover:bg-orange-600 transition-colors">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
                <p class="text-xs font-medium text-gray-600 mb-1">High Coverage</p>
                <p class="text-xl font-bold text-orange-600 group-hover:text-orange-700">55.8%</p>
                <p class="text-xs text-orange-500 mt-1">EU Standards</p>
            </div>
        </div>

        <!-- Maximum Coverage -->
        <div class="bg-gradient-to-br from-purple-50 to-purple-100 hover:from-purple-100 hover:to-purple-200 rounded-xl shadow-sm border border-purple-200 hover:border-purple-300 p-4 cursor-pointer transition-all duration-200 group" onclick="fillGHGValue(75.2)">
            <div class="text-center">
                <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center mx-auto mb-2 group-hover:bg-purple-600 transition-colors">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                </div>
                <p class="text-xs font-medium text-gray-600 mb-1">Max Coverage</p>
                <p class="text-xl font-bold text-purple-600 group-hover:text-purple-700">75.2%</p>
                <p class="text-xs text-purple-500 mt-1">Global Target</p>
            </div>
        </div>
    </div>

    <!-- Additional Information -->
    <div class="mt-6 bg-gray-50 rounded-lg p-4">
        <div class="flex items-start space-x-3">
            <div class="w-5 h-5 text-green-600 mt-0.5">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-900 mb-1">Coverage Ranges Explained</p>
                <div class="text-xs text-gray-600 space-y-1">
                    <p><strong>15.5%:</strong> Typical for developing nations with basic carbon policies</p>
                    <p><strong>35.0%:</strong> Regional markets with moderate environmental regulations</p>
                    <p><strong>55.8%:</strong> Advanced economies like EU with comprehensive carbon markets</p>
                    <p><strong>75.2%:</strong> Projected future global coverage under Paris Agreement targets</p>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
function fillGHGValue(value) {
    const input = document.getElementById('ghg-input');
    if (input) {
        input.value = value;
        input.focus();
        
        // Add visual feedback
        input.classList.add('ring-2', 'ring-green-500', 'border-green-500');
        setTimeout(() => {
            input.classList.remove('ring-2', 'ring-green-500', 'border-green-500');
        }, 1500);
        
        // Scroll to the input if needed
        input.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
}
</script>

        <!-- Quick Actions Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 sm:p-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 text-center">Quick Actions</h3>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('moreInfo') }}"
                    class="inline-flex items-center justify-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    View Charts & Analytics
                </a>
                <a href="{{ route('profile.edit') }}"
                    class="inline-flex items-center justify-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Edit Profile
                </a>
            </div>
        </div>
    </div>
</x-app-layout>