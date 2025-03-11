@foreach($this->posts as $post)
<div wire:key="{{ $post->id }}" x-data="{toggle: false}" class="mt-2 max-w-2xl mx-auto mb-6 bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200 dark:bg-gray-800">
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                <span class="text-gray-600 font-medium dark:text-black">{{ strtoupper(substr($post->user->name, 0, 1)) }}</span>
            </div>
            <div>
                <h3 class="text-gray-900 font-semibold text-lg hover:text-blue-600 cursor-pointer dark:text-white">
                    {{ $post->user->name }}
                </h3>
                <p class="text-gray-500 text-sm">
                    {{ $post->created_at->format('M d, Y · h:i A') }}
                </p>
            </div>
        </div>
        <div x-data="{ open: false }" @click.away="open = false" x-cloak class="relative">
            <button @click="open = !open" class="text-gray-500 hover:text-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </button>

            <div x-show="open" class="absolute right-0 mt-1 w-32 bg-white shadow-md rounded-md z-10">
{{--                @canany(['update', 'delete'], $post)--}}
                    <button wire:click="edit({{ $post->id }})" @click="toggleModal = true, open = false" class="block w-full text-left p-2 text-gray-700 hover:bg-gray-100">Edit</button>
                    <button wire:click="delete({{ $post->id }})" wire:confirm="Are You Sure?" class="block w-full text-left p-2 text-gray-700 hover:bg-gray-100">Delete</button>
{{--                @endcanany--}}
                    <button wire:click="report({{ $post->id }})" wire:confirm="Are You Sure?" class="block w-full text-left p-2 text-gray-700 hover:bg-gray-100">Report</button>

            </div>
        </div>

    </div>

    <div class="mb-6">
        <p class="text-gray-800 leading-relaxed dark:text-white">
            {{ $post->message }}
        </p>
    </div>

    <div class="flex items-center justify-between text-gray-600 border-t border-gray-100 pt-4">
        <button @click="toggle = !toggle" class="flex items-center space-x-2 hover:text-blue-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 21l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <span>Comment</span>
        </button>

        <button wire:click="like({{ $post->id }})" class="flex items-center space-x-2 hover:text-red-500 transition-colors">
            <svg class="w-5 h-5" fill="{{ $post->liked ? 'red' : 'none' }}" stroke="{{ $post->liked ? 'red' : 'currentColor' }}" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            <span>{{ $post->likes_count }}</span>
        </button>

        <button wire:click="repost" class="flex items-center space-x-2 hover:text-green-500 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004 9H0m0 7v-5h.582a8.001 8.001 0 0015.356 2M20 20v-5h-4" />
            </svg>
            <span>5k</span>
        </button>
    </div>

    <div x-show="toggle" x-cloak>
        @include('partials.show-comment')
    </div>
</div>
@endforeach
