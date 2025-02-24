<?php

namespace App\Livewire;

use App\Actions\LikeAction;
use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class CrudPost extends Component
{
    use WithPagination;

    public PostForm $postForm;

    public $isModalOpen = false;

    public $toggleComments = false;
    #[Computed]
    public function posts()
    {
        return Post::with(['user:id,name','comments','comments.user:id,name'])
            ->withCount('likes')
            ->withExists(['likes as liked' => function ($query) {$query->where('user_id', auth()->id());}])
            ->latest()
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.crud-post');
    }

    public function like(LikeAction $like_action, int $post_id)
    {
        $updatedPost = $like_action->execute($post_id);

        $this->posts->transform(function ($post) use ($updatedPost) {
            return $post->id === $updatedPost->id ? $updatedPost : $post;
        });
    }

    public function create()
    {
        $this->toggleModal();
    }

    public function toggleModal()
    {
        $this->isModalOpen = ! $this->isModalOpen;
    }
    public function comments()
    {
        $this->toggleComments = ! $this->toggleComments;
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
