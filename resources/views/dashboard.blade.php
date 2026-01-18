<x-layouts.app>
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">{{ __('Dashboard') }}</h1>
        <p class="text-gray-600 dark:text-gray-400">{{ __('Overview of your data management system.') }}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {{-- Budget Data Card --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border-l-4 border-blue-500">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ __('Budget Data') }}</h2>
                    <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ number_format($stats['budget']['count']) }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Records') }}</p>
                </div>
                <div class="p-2 bg-blue-100 dark:bg-blue-900 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
            </div>
            <div class="mt-4 flex space-x-2">
                <a href="{{ route('budget-data.index') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">{{ __('View List') }}</a>
                <span class="text-gray-300">|</span>
                <a href="{{ route('budget-data.create') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">{{ __('Add New') }}</a>
                <span class="text-gray-300">|</span>
                <a href="{{ route('budget-data.import-form') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">{{ __('Import') }}</a>
            </div>
        </div>

        {{-- Audit Data Card --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border-l-4 border-green-500">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ __('Audit Data') }}</h2>
                    <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ number_format($stats['audit']['count']) }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Records') }}</p>
                </div>
                <div class="p-2 bg-green-100 dark:bg-green-900 rounded-lg">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
            </div>
            <div class="mt-4 flex space-x-2">
                <a href="{{ route('audit-data.index') }}" class="text-sm text-green-600 dark:text-green-400 hover:underline">{{ __('View List') }}</a>
                <span class="text-gray-300">|</span>
                <a href="{{ route('audit-data.create') }}" class="text-sm text-green-600 dark:text-green-400 hover:underline">{{ __('Add New') }}</a>
                <span class="text-gray-300">|</span>
                <a href="{{ route('audit-data.import-form') }}" class="text-sm text-green-600 dark:text-green-400 hover:underline">{{ __('Import') }}</a>
            </div>
        </div>

        {{-- DSA Data Card --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border-l-4 border-purple-500">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ __('DSA Data') }}</h2>
                    <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ number_format($stats['dsa']['count']) }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Records') }}</p>
                </div>
                <div class="p-2 bg-purple-100 dark:bg-purple-900 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                </div>
            </div>
            <div class="mt-4 flex space-x-2">
                <a href="{{ route('dsa-data.index') }}" class="text-sm text-purple-600 dark:text-purple-400 hover:underline">{{ __('View List') }}</a>
                <span class="text-gray-300">|</span>
                <a href="{{ route('dsa-data.create') }}" class="text-sm text-purple-600 dark:text-purple-400 hover:underline">{{ __('Add New') }}</a>
                <span class="text-gray-300">|</span>
                <a href="{{ route('dsa-data.import-form') }}" class="text-sm text-purple-600 dark:text-purple-400 hover:underline">{{ __('Import') }}</a>
            </div>
        </div>

        {{-- MTB Data Card --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ __('Medium Term Budget') }}</h2>
                    <div class="flex flex-col">
                        <span class="text-lg font-bold text-gray-900 dark:text-gray-100">{{ number_format($stats['mtb']['macro_count']) }} <span class="text-xs font-normal text-gray-500">{{ __('Assumptions') }}</span></span>
                        <span class="text-lg font-bold text-gray-900 dark:text-gray-100">{{ number_format($stats['mtb']['revenue_count']) }} <span class="text-xs font-normal text-gray-500">{{ __('Projections') }}</span></span>
                    </div>
                </div>
                <div class="p-2 bg-yellow-100 dark:bg-yellow-900 rounded-lg">
                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
            </div>
            <div class="mt-4 flex flex-col space-y-1">
                <div class="flex space-x-2">
                    <span class="text-xs font-semibold text-gray-500 uppercase">{{ __('Macro:') }}</span>
                    <a href="{{ route('macro-assumptions.index') }}" class="text-sm text-yellow-600 dark:text-yellow-400 hover:underline">{{ __('List') }}</a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('macro-assumptions.import-form') }}" class="text-sm text-yellow-600 dark:text-yellow-400 hover:underline">{{ __('Import') }}</a>
                </div>
                <div class="flex space-x-2">
                    <span class="text-xs font-semibold text-gray-500 uppercase">{{ __('Rev:') }}</span>
                    <a href="{{ route('revenue-projections.index') }}" class="text-sm text-yellow-600 dark:text-yellow-400 hover:underline">{{ __('List') }}</a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('revenue-projections.import-form') }}" class="text-sm text-yellow-600 dark:text-yellow-400 hover:underline">{{ __('Import') }}</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Financial Overview (Optional - if totals are meaningful) --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">{{ __('Financial Overview') }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Total Budget Amount') }}</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ number_format($stats['budget']['total_amount'], 2) }}</p>
            </div>
            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Total Audit Amount') }}</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ number_format($stats['audit']['total_amount'], 2) }}</p>
            </div>
            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('projected Revenue') }}</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ number_format($stats['mtb']['total_revenue'], 2) }}</p>
            </div>
        </div>
    </div>

</x-layouts.app>
