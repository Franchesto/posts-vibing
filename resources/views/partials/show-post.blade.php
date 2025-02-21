<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <button wire:click="create" class="mb-4 bg-blue-500 text-white px-4 py-2 rounded">Create Post</button>
                    @foreach($this->posts as $post)
                    <div wire:key="{{ $post->id }}" class="border-b pb-4 mb-4 bg-gray-200 rounded">
                        <address class="flex items-center mb-6 not-italic">
                            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white mt-2 ml-2">
                                <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="{{ $post->user->name }}">
                                <div>
                                    <div class="flex space-x-2 items-center">
                                        <a href="#" rel="author" class="text-xl font-bold text-black">{{ $post->user->name }}</a>

                                        @canany(['delete', 'edit'], $post)
                                            <button wire:click="edit({{ $post->id }})">
                                                @svg('heroicon-s-pencil', 'w-4 h-4 text-blue-600')
                                            </button>
                                            <button wire:click="delete({{ $post->id }})" wire:confirm="Tem certeza que deseja deletar esse post?">
                                                @svg('heroicon-s-trash', 'w-4 h-4 text-red-500')
                                            </button>
                                        @endcanany
                                    </div>

                                    <p class="text-base text-gray-500 dark:text-gray-400">{{ $post->created_at }}</p>
                                </div>
                            </div>
                        </address>
                        <p class="ml-3">{{ $post->message }}</p>
                        <div class="flex mt-2 space-x-6 items-center ml-3 text-gray-600">
                            <div class="flex items-center space-x-1 text-sm">
                                <button wire:click="repost">
                                    @svg('heroicon-s-arrow-path-rounded-square', 'w-4 h-4')
                                </button>
                                <span> 2k </span>
                            </div>
                            <div class="flex items-center space-x-1 text-sm">
                                <button wire:click="like({{ $post->id }})">
                                    @svg('heroicon-s-hand-thumb-up', ['class' => 'w-4 h-4 ' . ($post->liked ? 'text-red-600' : 'text-gray-600')])
                                </button>
                                <span> {{ $post->likes_count }} </span>
                            </div>
                            <div class="flex items-center space-x-1 text-sm">
                                <button wire:click="comment">
                                    @svg('heroicon-s-chat-bubble-bottom-center-text', 'w-4 h-4')
                                </button>
                                <span> 8k </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
