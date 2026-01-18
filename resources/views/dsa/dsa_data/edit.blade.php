<x-layouts.app>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Edit DSA Data') }}</h1>
        <a href="{{ route('dsa-data.index') }}" class="text-blue-600 hover:text-blue-900 border border-blue-600 hover:bg-blue-50 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">
            {{ __('Back to List') }}
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <form action="{{ route('dsa-data.update', $dsaData) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Fiscal Year -->
                <div>
                    <label for="fiscal_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Fiscal Year') }}</label>
                    <input type="number" id="fiscal_year" name="fiscal_year" value="{{ old('fiscal_year', $dsaData->fiscal_year) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('fiscal_year')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- State -->
                <div>
                    <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('State') }}</label>
                    <input type="text" id="state" name="state" value="{{ old('state', $dsaData->state) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('state')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Variable Type -->
                <div>
                    <label for="variable_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Variable Type') }}</label>
                    <input type="text" id="variable_type" name="variable_type" value="{{ old('variable_type', $dsaData->variable_type) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('variable_type')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Variable Code -->
                <div>
                    <label for="variable_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Variable Code') }}</label>
                    <select id="variable_code" name="variable_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="">{{ __('Select Variable Code') }}</option>
                        @foreach ($dsaVariables as $variable)
                            <option value="{{ $variable->variable_code }}" {{ old('variable_code', $dsaData->variable_code) == $variable->variable_code ? 'selected' : '' }}>
                                {{ $variable->variable_code }}
                            </option>
                        @endforeach
                    </select>
                    @error('variable_code')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Description') }}</label>
                    <input type="text" id="description" name="description" value="{{ old('description', $dsaData->description) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Value -->
                <div>
                    <label for="value" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Value') }}</label>
                    <input type="number" step="0.01" id="value" name="value" value="{{ old('value', $dsaData->value) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('value')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end mt-6">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    {{ __('Update Record') }}
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
