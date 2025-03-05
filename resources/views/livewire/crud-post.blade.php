<div x-data="{toggleModal: false}">
    <div class="absolute top-20 right-36">
        <button @click="toggleModal = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create New Post
        </button>
    </div>

    @include('partials.show-post-refac')

    @include('partials.modal')
    {{ $this->posts->links() }}
</div>
