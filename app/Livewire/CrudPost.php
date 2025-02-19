<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class CrudPost extends Component
{
    use WithPagination;

    public PostForm $postForm;

    public $isModalOpen = false;

    public function render()
    {
        return view('livewire.crud-post', [
            'posts' => Post::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        $this->toggleModal();
    }

    public function toggleModal()
    {
        $this->isModalOpen = ! $this->isModalOpen;
    }

    public function store()
    {
        $this->postForm->create();

        $this->toggleModal();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('update', $post);

        $this->postForm->edit($post);

        $this->toggleModal();
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('delete', $post);

        $this->postForm->delete($post);
    }
}
