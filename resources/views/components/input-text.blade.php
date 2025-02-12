@props(['name'])

<div>
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-black">{{ $name }}</label>
    <div>
        <input type="text" name="{{ $name }}" {{ $attributes }} class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
    </div>
    <div>
        @error($attributes->wire('model')->value()) <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
</div>
