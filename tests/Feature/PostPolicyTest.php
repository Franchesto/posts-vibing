<?php

use App\Livewire\CrudPost;
use App\Models\Post;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->post = Post::factory()->for($this->user)->create();
//    $this->actingAs($this->user);
});
describe('post policies', function () {
    it('', function (){
        $this->otherUser = User::factory()->create();
        $this->actingAs($this->otherUser);

        Livewire::test(CrudPost::class)
            ->set('postForm.postId', $this->post->id)
            ->set('postForm.message', 'random message')
            ->call('store')
            ->assertForbidden();
    });
});
