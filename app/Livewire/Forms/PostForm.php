<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
    public ?Post $post;

    #[Validate('required|max:255')]
    public $message;

    public function store()
    {
        $this->validate();

        Post::create([
            'message' => $this->message,
            'user_id' => Auth::id()
        ]);

        $this->reset('message');
    }
    public function setPost(Post $post)
    {
        $this->post = $post;

        $this->fill($post->toArray());
    }
    public function update()
    {
        $this->validate();
        $this->post->update($this->only('message'));
    }
}
