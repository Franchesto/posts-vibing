<form wire:submit="createComment({{ $post->id }})" class="mt-4">
    <input wire:model="postForm.content" type="text" class="w-full bg-gray-100 dark:bg-gray-800 rounded-lg p-2" placeholder="Add a comment..."/>
    <button type="submit" class="bg-blue-500 text-white rounded-lg p-2 mt-2">Comment</button>
</form>
@foreach($post->comments as $comment)
    <div class="mt-4 border-t border-gray-100 pt-4 dark:text-white">
        <div class="flex justify-between">
            <h1>{{ $comment->user->name }}</h1>
            <span class="text-gray-500 text-sm">{{ $comment->created_at }}</span>
        </div>
        <p class="text-gray-400 text-sm">{{ $comment->content }}</p>
    </div>
@endforeach
