<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                    <span class="text-2xl font-bold text-[#0C8A6F] dark:text-[#0C8A6F]">CCPPM</span>
                </a>
            </div>

            <!-- User Info & Logout -->
            <div class="flex items-center space-x-6">
                @auth
                    <div class="text-right">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Welcome, {{ Auth::user()->name }}
                        </h2>
                    </div>

                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit"
                            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
