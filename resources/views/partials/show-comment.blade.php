@foreach($post->comments as $comment)
    <div class="mt-4 border-t border-gray-100 pt-4">
        <div class="flex justify-between">
            <h1>{{ $comment->user->name }}</h1>
            <span class="text-gray-500 text-sm">{{ $comment->created_at }}</span>
        </div>
        <p class="text-gray-500 text-sm">{{ $comment->content }}</p>
    </div>
@endforeach
