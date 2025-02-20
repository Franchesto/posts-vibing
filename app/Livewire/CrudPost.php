<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use App\Models\Like;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class CrudPost extends Component
{
    use WithPagination;

    public PostForm $postForm;

    public $isModalOpen = false;

    #[Computed]
    public function posts()
    {
        return Post::with('user')
            ->withCount('likes')
            ->withExists(['likes as liked' => function ($query) {
                $query->where('user_id', auth()->id());
            }])
            ->latest()
            ->paginate(10);
    }
    public function render()
    {
        return view('livewire.crud-post');
    }

    public function like($post_id)
    {
        $flag = $this->posts->find($post_id)->liked;
        if($flag){
            $this->posts->find($post_id)->likes_count--;
            $this->posts->find($post_id)->liked = false;
            Like::where('post_id', $post_id)->where('user_id', auth()->id())->delete();
        }
        else{
            $this->posts->find($post_id)->liked = true;
            $this->posts->find($post_id)->likes_count++;
            Like::create(['post_id' => $post_id, 'user_id' => auth()->id()]);
        }
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
