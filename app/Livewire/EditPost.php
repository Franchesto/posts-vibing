<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditPost extends Component
{
    public bool $toggleForm = false;

    public PostForm $form;

    public $post_id;

    public bool $showEditIcon = false;

    public function mount($post_id)
    {
        $this->post_id = $post_id;

        $post = Post::where('id', $post_id)->first();

        if(Auth::user()->id == $post->user_id){
            $this->showEditIcon = true;
        }

        $this->form->setPost($post);
    }

    public function submit()
    {
        $this->form->update();

        return $this->redirect('posts');
    }

    public function showForm()
    {
        $this->toggleForm = !$this->toggleForm;
    }
    public function render()
    {
        return view('livewire.edit-post');
    }
}
