<x-layouts.app>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Revenue Projection Details') }}</h1>
        <a href="{{ route('revenue-projections.index') }}" class="text-blue-600 hover:text-blue-900 border border-blue-600 hover:bg-blue-50 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">
            {{ __('Back to List') }}
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Fiscal Year') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ $revenueProjection->fiscal_year }}</p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Revenue Code') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ $revenueProjection->revenue_code }}</p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4 md:col-span-2">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Description') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ $revenueProjection->description }}</p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Projected Amount') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ number_format($revenueProjection->projected_amount, 2) }}</p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Created At') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ $revenueProjection->created_at->format('Y-m-d H:i') }}</p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Last Updated') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ $revenueProjection->updated_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>

        <div class="mt-8 flex space-x-4">
            <a href="{{ route('revenue-projections.edit', $revenueProjection) }}" class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-indigo-500 dark:hover:bg-indigo-600 focus:outline-none dark:focus:ring-indigo-800">
                {{ __('Edit Projection') }}
            </a>
            <form action="{{ route('revenue-projections.destroy', $revenueProjection) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-500 dark:hover:bg-red-600 focus:outline-none dark:focus:ring-red-900" onclick="return confirm('Are you sure?')">
                    {{ __('Delete Projection') }}
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
