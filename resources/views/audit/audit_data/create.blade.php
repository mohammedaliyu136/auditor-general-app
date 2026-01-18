<x-layouts.app>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Create Audit Data') }}</h1>
        <a href="{{ route('audit-data.index') }}" class="text-blue-600 hover:text-blue-900 border border-blue-600 hover:bg-blue-50 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">
            {{ __('Back to List') }}
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <form action="{{ route('audit-data.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Fiscal Year -->
                <div>
                    <label for="fiscal_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Fiscal Year') }}</label>
                    <input type="number" id="fiscal_year" name="fiscal_year" value="{{ old('fiscal_year') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('fiscal_year')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- State -->
                <div>
                    <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('State') }}</label>
                    <input type="text" id="state" name="state" value="{{ old('state') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('state')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Statement Type -->
                <div>
                    <label for="statement_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Statement Type') }}</label>
                    <input type="text" id="statement_type" name="statement_type" value="{{ old('statement_type') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('statement_type')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Line Item Code -->
                <div>
                    <label for="line_item_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Line Item Code') }}</label>
                    <select id="line_item_code" name="line_item_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="">{{ __('Select Line Item Code') }}</option>
                        @foreach ($lineItems as $item)
                            <option value="{{ $item->line_item_code }}" {{ old('line_item_code') == $item->line_item_code ? 'selected' : '' }}>
                                {{ $item->line_item_code }}
                            </option>
                        @endforeach
                    </select>
                    @error('line_item_code')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Line Item Description -->
                <div class="md:col-span-2">
                    <label for="line_item_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Line Item Description') }}</label>
                    <input type="text" id="line_item_description" name="line_item_description" value="{{ old('line_item_description') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('line_item_description')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Fund -->
                <div>
                    <label for="fund" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Fund') }}</label>
                    <input type="text" id="fund" name="fund" value="{{ old('fund') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('fund')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Amount -->
                <div>
                    <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Amount') }}</label>
                    <input type="number" step="0.01" id="amount" name="amount" value="{{ old('amount') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('amount')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end mt-6">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    {{ __('Create Record') }}
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
