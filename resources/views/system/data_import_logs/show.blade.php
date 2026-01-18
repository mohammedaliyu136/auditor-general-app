<x-layouts.app>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Import Log Details') }}</h1>
        <a href="{{ route('data-import-logs.index') }}" class="text-blue-600 hover:text-blue-900 border border-blue-600 hover:bg-blue-50 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">
            {{ __('Back to List') }}
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Module') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ $dataImportLog->module }}</p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Source') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ $dataImportLog->source_name }}</p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Date') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ $dataImportLog->created_at->format('F j, Y g:i A') }}</p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Status') }}</p>
                <p class="mt-1">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                        {{ $dataImportLog->status === 'success' ? 'bg-green-100 text-green-800' : '' }}
                        {{ $dataImportLog->status === 'failed' ? 'bg-red-100 text-red-800' : '' }}
                        {{ $dataImportLog->status === 'partial' ? 'bg-yellow-100 text-yellow-800' : '' }}
                    ">
                        {{ ucfirst($dataImportLog->status) }}
                    </span>
                </p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Total Rows') }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ number_format($dataImportLog->total_rows) }}</p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Imported Rows') }}</p>
                <p class="text-lg font-semibold text-green-600 mt-1">{{ number_format($dataImportLog->imported_rows) }}</p>
            </div>

            <div class="border-b dark:border-gray-700 pb-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Failed Rows') }}</p>
                <p class="text-lg font-semibold text-red-600 mt-1">{{ number_format($dataImportLog->failed_rows) }}</p>
            </div>
        </div>

        @if($dataImportLog->error_log && count($dataImportLog->error_log) > 0)
            <div class="mt-8">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">{{ __('Error Log') }}</h3>
                <div class="bg-gray-50 dark:bg-gray-900 rounded p-4 text-sm font-mono overflow-auto max-h-96">
                    <pre>{{ json_encode($dataImportLog->error_log, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                </div>
            </div>
        @endif
    </div>
</x-layouts.app>
