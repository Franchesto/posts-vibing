<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
    #[Validate('required|max:255')]
    public $message = '';

    public $postId;

    public function create()
    {
        $this->validate();

        Post::updateOrCreate(['id' => $this->postId], [
            'message' => $this->message,
            'user_id' => auth()->id()
        ]);

        $this->reset();
    }

    public function edit($post)
    {
        $this->postId = $post->id;

        $this->message = $post->message;
    }

    public function delete($post)
    {
        $post->delete();
    }
}
