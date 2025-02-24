<div>

    <div class="flex justify-center mt-2">
        <button wire:click="create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create New Post
        </button>
    </div>
    @include('partials.show-post-refac')

    @include('partials.modal', ['isModalOpen' => $isModalOpen])
    {{ $this->posts->links() }}
</div>
