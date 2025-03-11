<?php

use App\Livewire\CrudPost;
use App\Models\Post;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->post = Post::factory()->for($this->user)->create();
});

describe('post policies', function () {
    it('validates guest access for posts route', function () {
        $response = $this->get(route('posts'));

        $response->assertRedirect('login');
    });

    it('denies a non-owner from editing another user’s post', function () {
        $this->otherUser = User::factory()->create();
        $this->actingAs($this->otherUser);

        Livewire::test(CrudPost::class)
            ->call('edit', $this->post->id)
            ->assertForbidden();
    });

    it('denies a non-owner from deleting another user’s post', function () {
        $this->otherUser = User::factory()->create();
        $this->actingAs($this->otherUser);

        Livewire::test(CrudPost::class)
            ->call('delete', $this->post->id)
            ->assertForbidden();
    });
});
