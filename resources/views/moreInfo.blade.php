<x-app-layout>
    <x-slot name="header">
        More Information
    </x-slot>

    <div class="max-w-6xl mx-auto space-y-8">
        <!-- Page Header -->
        <div class="bg-gradient-to-r from-green-50 to-green-100 rounded-xl p-6 sm:p-8 border border-green-200">
            <div class="text-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-green-800 mb-2">
                    Market Analytics & Insights
                </h2>
                <p class="text-green-700">
                    Explore historical trends and market patterns in carbon credit pricing
                </p>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <!-- Chart Header -->
            <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 sm:px-8 py-6">
                <div class="flex flex-col sm:flex-row items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-white">Carbon Credit Price Trends</h3>
                        <p class="text-green-100 mt-1">Historical price data and market analysis</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2">
                            <span class="text-white text-sm font-medium">Live Data</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart Container -->
            <div class="p-6 sm:p-8">
                <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                    <canvas id="carbonPriceChart" class="w-full" style="height: 400px; max-height: 400px;"></canvas>
                </div>
                
                <!-- Chart Controls -->
                <div class="mt-6 flex flex-wrap items-center justify-center gap-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-4 h-4 bg-green-600 rounded"></div>
                        <span class="text-sm text-gray-600">Carbon Credit Price ($)</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-4 h-4 bg-green-200 rounded"></div>
                        <span class="text-sm text-gray-600">Price Range</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Market Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Average Price Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-600">Average Price</p>
                        <p class="text-2xl font-bold text-gray-900" id="averagePrice">
                            <span class="inline-block w-16 h-6 bg-gray-200 animate-pulse rounded"></span>
                        </p>
                        <p class="text-xs mt-1" id="averagePriceChange">
                            <span class="inline-block w-20 h-4 bg-gray-200 animate-pulse rounded"></span>
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Current Price Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-600">Current Price</p>
                        <p class="text-2xl font-bold text-gray-900" id="currentPrice">
                            <span class="inline-block w-16 h-6 bg-gray-200 animate-pulse rounded"></span>
                        </p>
                        <p class="text-xs mt-1" id="currentPriceChange">
                            <span class="inline-block w-20 h-4 bg-gray-200 animate-pulse rounded"></span>
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Price Range Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-600">Price Range</p>
                        <p class="text-lg font-bold text-gray-900" id="priceRange">
                            <span class="inline-block w-20 h-5 bg-gray-200 animate-pulse rounded"></span>
                        </p>
                        <p class="text-xs text-purple-600 mt-1" id="priceVolatility">
                            <span class="inline-block w-16 h-4 bg-gray-200 animate-pulse rounded"></span>
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Highest Price -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
                <div class="text-center">
                    <p class="text-sm font-medium text-gray-600">Highest Price</p>
                    <p class="text-xl font-bold text-green-600" id="highestPrice">
                        <span class="inline-block w-16 h-5 bg-gray-200 animate-pulse rounded"></span>
                    </p>
                </div>
            </div>

            <!-- Lowest Price -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
                <div class="text-center">
                    <p class="text-sm font-medium text-gray-600">Lowest Price</p>
                    <p class="text-xl font-bold text-red-600" id="lowestPrice">
                        <span class="inline-block w-16 h-5 bg-gray-200 animate-pulse rounded"></span>
                    </p>
                </div>
            </div>

            <!-- Data Points -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
                <div class="text-center">
                    <p class="text-sm font-medium text-gray-600">Data Points</p>
                    <p class="text-xl font-bold text-blue-600" id="dataPoints">
                        <span class="inline-block w-12 h-5 bg-gray-200 animate-pulse rounded"></span>
                    </p>
                </div>
            </div>

            
        </div>

        <!-- Market Insights -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 sm:px-8 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Market Insights</h3>
            </div>
            <div class="p-6 sm:p-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Key Factors -->
                    <div>
                        <h4 class="text-base font-semibold text-gray-900 mb-4">Key Price Factors</h4>
                        <div class="space-y-3">
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Regulatory Changes</p>
                                    <p class="text-xs text-gray-600">Government policies and carbon tax implementations</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Supply & Demand</p>
                                    <p class="text-xs text-gray-600">Market dynamics and corporate ESG commitments</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Technology Advances</p>
                                    <p class="text-xs text-gray-600">Improvements in carbon capture and verification</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Trends -->
                    <div>
                        <h4 class="text-base font-semibold text-gray-900 mb-4">Recent Trends</h4>
                        <div class="space-y-3">
                            <div class="bg-green-50 rounded-lg p-3 border border-green-200">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium text-green-800">Voluntary Markets</span>
                                    <span class="text-xs text-green-600">+15%</span>
                                </div>
                                <p class="text-xs text-green-700 mt-1">Growing corporate demand</p>
                            </div>
                            <div class="bg-blue-50 rounded-lg p-3 border border-blue-200">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium text-blue-800">Compliance Markets</span>
                                    <span class="text-xs text-blue-600">+8%</span>
                                </div>
                                <p class="text-xs text-blue-700 mt-1">Stable regulatory demand</p>
                            </div>
                            <div class="bg-purple-50 rounded-lg p-3 border border-purple-200">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium text-purple-800">Technology Credits</span>
                                    <span class="text-xs text-purple-600"> +22%</span>
                                </div>
                                <p class="text-xs text-purple-700 mt-1">Premium for tech solutions</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="text-center">
            <a href="{{ route('dashboard') }}" 
               class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-sm hover:shadow-md transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                </svg>
                Back to Dashboard
            </a>
        </div>

        <!-- Error Display -->
        @if($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-red-700 font-medium">
                        {{ $errors->first() }}
                    </p>
                </div>
            </div>
        @endif
    </div>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Get data from Laravel
        const chartLabels = @json($chartData['labels']);
        const chartPrices = @json($chartData['prices']);

        // Calculate metrics from chart data
        function calculateMetrics(prices) {
            if (!prices || prices.length === 0) return null;

            const validPrices = prices.filter(price => price !== null && !isNaN(price));
            if (validPrices.length === 0) return null;

            const average = validPrices.reduce((sum, price) => sum + price, 0) / validPrices.length;
            const highest = Math.max(...validPrices);
            const lowest = Math.min(...validPrices);
            const current = validPrices[validPrices.length - 1];
            const previous = validPrices.length > 1 ? validPrices[validPrices.length - 2] : current;
            
            const currentChange = ((current - previous) / previous) * 100;
            const averageChange = validPrices.length > 10 ? 
                ((average - (validPrices.slice(0, Math.floor(validPrices.length / 2)).reduce((sum, price) => sum + price, 0) / Math.floor(validPrices.length / 2))) / (validPrices.slice(0, Math.floor(validPrices.length / 2)).reduce((sum, price) => sum + price, 0) / Math.floor(validPrices.length / 2))) * 100 : 0;
            
            const volatility = Math.sqrt(validPrices.reduce((sum, price) => sum + Math.pow(price - average, 2), 0) / validPrices.length);
            const volatilityPercent = (volatility / average) * 100;

            // Determine trend
            const recentPrices = validPrices.slice(-5);
            const trendSlope = recentPrices.length > 1 ? 
                (recentPrices[recentPrices.length - 1] - recentPrices[0]) / recentPrices.length : 0;

            let trend = 'Stable';
            let trendColor = 'text-gray-600';
            if (trendSlope > 0.5) {
                trend = '↗ Bullish';
                trendColor = 'text-green-600';
            } else if (trendSlope < -0.5) {
                trend = '↘ Bearish';
                trendColor = 'text-red-600';
            }

            return {
                average: average,
                highest: highest,
                lowest: lowest,
                current: current,
                currentChange: currentChange,
                averageChange: averageChange,
                volatility: volatilityPercent,
                dataPoints: validPrices.length,
                trend: trend,
                trendColor: trendColor
            };
        }

        // Update DOM with calculated metrics
        function updateMetrics() {
            const metrics = calculateMetrics(chartPrices);
            
            if (!metrics) {
                console.error('Unable to calculate metrics from chart data');
                return;
            }

            // Average Price
            document.getElementById('averagePrice').textContent = `$${metrics.average.toFixed(2)}`;
            document.getElementById('averagePriceChange').innerHTML = 
                `<span class="${metrics.averageChange >= 0 ? 'text-green-600' : 'text-red-600'}">
                    ${metrics.averageChange >= 0 ? '↗' : '↘'} ${Math.abs(metrics.averageChange).toFixed(1)}% historical avg
                </span>`;

            // Current Price
            document.getElementById('currentPrice').textContent = `$${metrics.current.toFixed(2)}`;
            document.getElementById('currentPriceChange').innerHTML = 
                `<span class="${metrics.currentChange >= 0 ? 'text-green-600' : 'text-red-600'}">
                    ${metrics.currentChange >= 0 ? '↗' : '↘'} ${Math.abs(metrics.currentChange).toFixed(1)}% from previous
                </span>`;

            // Price Range
            document.getElementById('priceRange').textContent = 
                `$${metrics.lowest.toFixed(2)} - $${metrics.highest.toFixed(2)}`;
            document.getElementById('priceVolatility').innerHTML = 
                `<span class="text-purple-600">Volatility: ${metrics.volatility.toFixed(1)}%</span>`;

            // Additional Statistics
            document.getElementById('highestPrice').textContent = `$${metrics.highest.toFixed(2)}`;
            document.getElementById('lowestPrice').textContent = `$${metrics.lowest.toFixed(2)}`;
            document.getElementById('dataPoints').textContent = metrics.dataPoints;
            document.getElementById('trendDirection').innerHTML = 
                `<span class="${metrics.trendColor}">${metrics.trend}</span>`;
        }

        // Initialize Chart
        const ctx = document.getElementById('carbonPriceChart').getContext('2d');
        const carbonChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartLabels,
                datasets: [{
                    label: 'Carbon Credit Price ($)',
                    data: chartPrices,
                    borderColor: '#059669',
                    backgroundColor: 'rgba(5, 150, 105, 0.1)',
                    borderWidth: 3,
                    tension: 0.4,
                    fill: true,
                    pointRadius: 0,
                    pointHoverRadius: 8,
                    pointHoverBackgroundColor: '#059669',
                    pointHoverBorderColor: '#ffffff',
                    pointHoverBorderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    intersect: false,
                    mode: 'index'
                },
                scales: {
                    x: {
                        title: { 
                            display: true, 
                            text: 'Date',
                            font: {
                                size: 14,
                                weight: 'bold'
                            },
                            color: '#374151'
                        },
                        ticks: {
                            maxTicksLimit: 10,
                            color: '#6B7280'
                        },
                        grid: {
                            color: '#F3F4F6'
                        }
                    },
                    y: {
                        title: { 
                            display: true, 
                            text: 'Price (USD)',
                            font: {
                                size: 14,
                                weight: 'bold'
                            },
                            color: '#374151'
                        },
                        beginAtZero: false,
                        ticks: {
                            color: '#6B7280',
                            callback: function(value) {
                                return '$' + value.toFixed(2);
                            }
                        },
                        grid: {
                            color: '#F3F4F6'
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        backgroundColor: '#ffffff',
                        titleColor: '#374151',
                        bodyColor: '#6B7280',
                        borderColor: '#059669',
                        borderWidth: 1,
                        cornerRadius: 8,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return 'Price: $' + context.parsed.y.toFixed(2);
                            }
                        }
                    },
                    legend: {
                        display: false
                    }
                },
                onHover: function(event, elements) {
                    event.native.target.style.cursor = elements.length > 0 ? 'pointer' : 'default';
                }
            }
        });

        // Update metrics after chart is created
        updateMetrics();

        // Optional: Refresh metrics every 30 seconds if you have live data
        // setInterval(updateMetrics, 30000);
    </script>
</x-app-layout>