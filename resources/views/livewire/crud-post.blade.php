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
                <td class="border px-4 py-2">
                    <button wire:click="edit({{ $post->id }})" class="bg-green-500 text-white px-4 py-2 rounded">Edit</button>
                    <button wire:click="delete({{ $post->id }})" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    @if ($isModalOpen)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg w-1/2">
                <h2 class="text-xl mb-4">{{ $postId ? 'Edit Post' : 'Create Post' }}</h2>
                <form wire:submit="store">
                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea wire:model="message" id="message" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" autofocus></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" wire:click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
    {{ $posts->links() }}
</div>
