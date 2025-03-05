<div x-data="{post: '', maxLength: 255}"
     x-show="toggleModal"
     x-cloak
     @click.outside="toggleModal = false"
     class="flex fixed inset-0 bg-black bg-opacity-50 items-center justify-center">
    <div class="bg-white p-8 rounded-lg w-1/2">
        <h2 class="text-xl mb-4">{{ $postForm->postId ? 'Edit Post' : 'Create Post' }}</h2>
        <form wire:submit="store">
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea x-model="post" maxlength wire:model="postForm.message" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" autofocus></textarea>
                <span x-text="post.length"></span>/<span x-text="maxLength"></span>
                @error('postForm.message') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-end">
                <button type="button" @click="toggleModal = false, post = ''" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                <button type="submit" @click="toggleModal = false, post = ''" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
            </div>
        </form>
    </div>
</div>
