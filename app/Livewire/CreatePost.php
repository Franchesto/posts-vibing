<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use Livewire\Component;

class CreatePost extends Component
{
    public PostForm $form;

    public bool $toggleForm = false;

    public function showForm()
    {
        $this->toggleForm = !$this->toggleForm;
    }

    public function submit()
    {
        $this->form->store();

        $this->showForm();

        $this->dispatch('post-created');
    }
    public function render()
    {
        return view('livewire.create-post');
    }
}
