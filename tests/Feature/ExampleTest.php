<?php

use App\Actions\ToggleLikeAction;
use App\Livewire\CrudPost;
use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

describe('Post Manager', function () {
    it('renders component correctly', function () {
        Livewire::test(CrudPost::class)
            ->assertSee('Create New Post');
    });

    it('validates post creation', function () {
        Livewire::test(CrudPost::class)
            ->set('postForm.message', '')
            ->call('store')
            ->assertHasErrors(['postForm.message' => 'required']);
    });

    it('creates and renders posts correctly', function () {
        Post::factory()->create(['message' => 'Test Post']);

        Livewire::test(CrudPost::class)
            ->assertSee('Test Post');
    });

    it('updates an existing post', function () {
        $post = Post::factory()->for($this->user)->create(['message' => 'Old message']);

        Livewire::test(CrudPost::class)
            ->set('postForm.postId', $post->id)
            ->set('postForm.message', 'Updated message')
            ->call('store')
            ->assertSee('Updated message');
    });

    it('validates editing a post', function () {
        $post = Post::factory()->for($this->user)->create(['message' => 'Old message']);

        Livewire::test(CrudPost::class)
            ->set('postForm.postId', $post->id)
            ->set('postForm.message', '')
            ->call('store')
            ->assertHasErrors(['postForm.message' => 'required']);
    });

    it('likes and unlike a post', function () {
        $post = Post::factory()->for($this->user)->create();

        Livewire::test(CrudPost::class)
            ->call('like', (new ToggleLikeAction), $post->id)
            ->assertSee('likes: 1')
            ->call('like', (new ToggleLikeAction), $post->id)
            ->assertSee('likes: 0')
        ->assert;
    });

    it('creates and renders a comment for a post', function () {
        $post = Post::factory()->create();

        Livewire::test(CrudPost::class)
            ->assertSee($post->message)
            ->set('postForm.content', 'Test Comment!')
            ->call('createComment', $post->id)
            ->assertSee('Test Comment');
    });

    it('soft deletes a post', function () {
        $post = Post::factory()->for($this->user)->create();

        Livewire::test(CrudPost::class)
            ->assertSee($post->message)
            ->call('delete', $post->id)
            ->assertDontSee($post->message);
    });

});
