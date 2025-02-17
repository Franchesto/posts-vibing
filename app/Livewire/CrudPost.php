<?php

namespace App\Livewire;

use App\Models\Post;
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
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function resetInputFields()
    {
        $this->postId = '';
        $this->message = '';
    }

    public function store()
    {
        $this->validate();

        Post::updateOrCreate(['id' => $this->postId], [
            'message' => $this->message,
            'user_id' => auth()->id()
        ]);

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->postId = $id;
        $this->message = $post->message;

        $this->openModal();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
    }

}
