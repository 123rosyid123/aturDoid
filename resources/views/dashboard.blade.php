<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AturDOit</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-orange-500">Atur<span class="text-gray-800">DOit</span></span>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">Welcome, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-red-600 transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Welcome to Your Dashboard!</h1>
            <p class="text-gray-600">This is a basic dashboard. In a real application, this would contain your financial overview, charts, and management tools.</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="bg-blue-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-wallet text-blue-500 text-xl"></i>
                    </div>
                    <div>
                        <div class="text-gray-500 text-sm">Total Balance</div>
                        <div class="text-2xl font-bold text-gray-900">Rp 5,200,000</div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-arrow-up text-green-500 text-xl"></i>
                    </div>
                    <div>
                        <div class="text-gray-500 text-sm">Monthly Income</div>
                        <div class="text-2xl font-bold text-gray-900">Rp 8,500,000</div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-arrow-down text-red-500 text-xl"></i>
                    </div>
                    <div>
                        <div class="text-gray-500 text-sm">Monthly Expense</div>
                        <div class="text-2xl font-bold text-gray-900">Rp 3,200,000</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Portfolio Overview</h2>
            <div class="flex items-center justify-center h-64 bg-gray-100 rounded-lg">
                <div class="text-center">
                    <i class="fas fa-chart-line text-gray-400 text-4xl mb-2"></i>
                    <p class="text-gray-500">Chart component would go here</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Quick Actions</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <button class="bg-orange-500 text-white p-4 rounded-lg hover:bg-orange-600 transition-colors">
                    <i class="fas fa-plus mb-2"></i>
                    <div>Add Transaction</div>
                </button>
                <button class="bg-blue-500 text-white p-4 rounded-lg hover:bg-blue-600 transition-colors">
                    <i class="fas fa-piggy-bank mb-2"></i>
                    <div>Set Savings Goal</div>
                </button>
                <button class="bg-green-500 text-white p-4 rounded-lg hover:bg-green-600 transition-colors">
                    <i class="fas fa-file-invoice mb-2"></i>
                    <div>View Reports</div>
                </button>
                <button class="bg-purple-500 text-white p-4 rounded-lg hover:bg-purple-600 transition-colors">
                    <i class="fas fa-cog mb-2"></i>
                    <div>Settings</div>
                </button>
            </div>
        </div>
    </div>
</body>
</html>
