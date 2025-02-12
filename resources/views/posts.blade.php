<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feed') }}
        </h2>
    </x-slot>
    <livewire:create-post :user_id="auth()->id()" />
    <livewire:show-post />
</x-app-layout>
