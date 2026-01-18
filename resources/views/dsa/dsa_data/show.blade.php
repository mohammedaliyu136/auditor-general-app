<x-layouts.app>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('DSA Data Details') }}</h1>
        <a href="{{ route('dsa-data.index') }}" class="text-blue-600 hover:text-blue-900 border border-blue-600 hover:bg-blue-50 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">
            {{ __('Back to List') }}
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Fiscal Year') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ $dsaData->fiscal_year }}</p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('State') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ $dsaData->state }}</p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Variable Type') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ $dsaData->variable_type }}</p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Variable Code') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ $dsaData->variable_code }}</p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4 md:col-span-2">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Description') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ $dsaData->description }}</p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Value') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ number_format($dsaData->value, 2) }}</p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Created At') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ $dsaData->created_at->format('Y-m-d H:i') }}</p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Last Updated') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ $dsaData->updated_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>

        <div class="mt-8 flex space-x-4">
            <a href="{{ route('dsa-data.edit', $dsaData) }}" class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-indigo-500 dark:hover:bg-indigo-600 focus:outline-none dark:focus:ring-indigo-800">
                {{ __('Edit Record') }}
            </a>
            <form action="{{ route('dsa-data.destroy', $dsaData) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-500 dark:hover:bg-red-600 focus:outline-none dark:focus:ring-red-900" onclick="return confirm('Are you sure?')">
                    {{ __('Delete Record') }}
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
