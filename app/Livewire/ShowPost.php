<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowPost extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts = Post::all();
    }
    #[On('post-created')]
    public function updatePostList()
    {
        $this->posts = Post::latest()->get();
    }

    public function render()
    {
        return view('livewire.show-post');
    }
}
