<div class="flex items-center space-x-1 text-sm">
    <button wire:click="like">
        @svg('heroicon-s-hand-thumb-up', 'w-4 h-4 ' . ($isLiked ? 'text-red-600' : 'text-gray-600'))
    </button>
    <span> {{ $likes }} </span>
</div>
