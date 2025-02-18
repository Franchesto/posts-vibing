<div>
    <button wire:click="create" class="bg-blue-500 text-white px-4 py-2 rounded">Create Post</button>

    <table class="table-auto w-full mt-4">
        <thead>
        <tr>
            <th class="px-4 py-2">Message</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td class="border px-4 py-2">{{ $post->message }}</td>
                <td class="border px-4 py-2 flex justify-end space-x-4  ">
                    @canany(['delete', 'edit'], $post)
                        <button wire:click="edit({{ $post->id }})">
                            @svg('heroicon-o-pencil', 'w-4 h-4')
                        </button>
                        <button wire:click="delete({{ $post->id }})" wire:confirm="Tem certeza que seja deleter esse post?" >
                            @svg('heroicon-o-trash', 'w-4 h-4 text-red-500')
                        </button>
                    @endcanany
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @include('partials.modal', ['isModalOpen' => $isModalOpen])
    {{ $posts->links() }}
</div>
