<x-layouts.app>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Import Revenue Projections') }}</h1>
        <a href="{{ route('revenue-projections.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
            {{ __('Back to List') }}
        </a>
    </div>

    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
        
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">{{ __('Instructions') }}</h2>
            <p class="text-gray-600 dark:text-gray-300 mb-4">
                {{ __('Please upload an Excel (.xlsx) or CSV file containing your Revenue Projections. To ensure a successful import, your file must match the required format.') }}
            </p>
            
            <div class="bg-blue-50 dark:bg-blue-900 border-l-4 border-blue-500 p-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-blue-700 dark:text-blue-200">
                            {{ __('We recommend downloading the sample template to see the correct column headers and data format.') }}
                        </p>
                    </div>
                </div>
            </div>

            <a href="{{ route('revenue-projections.download-sample') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                {{ __('Download Sample Template') }}
            </a>
        </div>

        <hr class="border-gray-200 dark:border-gray-700 my-6">

        <div>
            <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">{{ __('Upload File') }}</h2>
            <form action="{{ route('revenue-projections.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="file" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Choose File') }}</label>
                    <input type="file" name="file" id="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" required>
                    @error('file')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Import Data') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
