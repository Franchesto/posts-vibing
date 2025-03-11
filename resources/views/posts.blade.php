<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('posts') }}
        </h2>
    </x-slot>

    <livewire:crud-post/>

</x-app-layout>
-
