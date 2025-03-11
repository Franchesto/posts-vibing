<?php

use App\Livewire\PostManager;
use App\Models\Post;
use App\Models\User;
use function Pest\Laravel\actingAs;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->post = Post::factory()->for($this->user)->create();
});

describe('Post Policies', function () {
    it('', function () {
        $otherUser = User::factory()->create();
        $this->actingAs($otherUser);

        Livewire::test(PostManager::class)
            ->set('postForm.postId', $this->post->id)
            ->set('postForm.message', 'A Message')
            ->call('store')
            ->assertUnauthorized();
    });

});
