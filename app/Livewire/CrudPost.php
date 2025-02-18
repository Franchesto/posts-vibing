<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class CrudPost extends Component
{
    use WithPagination;

    #[Validate('required|max:255')]
    public $message;
    public $postId;
    public $isModalOpen = false;

    public function render()
    {
        return view('livewire.crud-post', [
            'posts' => Post::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        $this->reset('message', 'postId');
        $this->toggleModal();
    }

    public function toggleModal()
    {
        $this->isModalOpen = !$this->isModalOpen;
    }

    public function store()
    {
        $this->validate();

        Post::updateOrCreate(['id' => $this->postId], [
            'message' => $this->message,
            'user_id' => auth()->id()
        ]);

        $this->toggleModal();

        $this->reset('message', 'postId');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('update', $post);

        $this->postId = $id;
        $this->message = $post->message;

        $this->toggleModal();
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('delete', $post);

        $post->delete();
    }

}
