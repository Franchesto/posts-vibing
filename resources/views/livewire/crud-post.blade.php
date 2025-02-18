<div>

    @include('partials.show-post')

    @include('partials.modal', ['isModalOpen' => $isModalOpen])
    {{ $posts->links() }}
</div>
