<div class="{{ $isModalOpen ? 'flex' : 'hidden' }} fixed inset-0 bg-black bg-opacity-50 items-center justify-center">
    <div class="bg-white p-8 rounded-lg w-1/2">
        <h2 class="text-xl mb-4">{{ $postForm->postId ? 'Edit Post' : 'Create Post' }}</h2>
        <form wire:submit="store">
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea wire:model="postForm.message" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" autofocus></textarea>
                @error('postForm.message') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-end">
                <button type="button" wire:click="toggleModal" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
            </div>
        </form>
    </div>
</div>
