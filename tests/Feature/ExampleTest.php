<?php

use App\Livewire\CrudPost;
use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;

it('checks posts successful response and authorization', function () {

    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->get(route('posts'));

    $response->assertStatus(200);

});

it('tests ability to create a post', function(){

    $user = User::factory()->create();
    $this->actingAs($user);

    Livewire::test(CrudPost::class)
    ->set('postForm.message', 'testing dewnik')
    ->call('store');

    expect(Post::count())->toBe(1);
    expect(Post::first()->message)->toBe('testing dewnik');
});

it('tests ability to edit a post', function(){

    $user = User::factory()->create();
    $this->actingAs($user);

    $post = Post::factory()->for($user)->create();

    $policy = new PostPolicy();

    expect($policy->update($user, $post))->toBeTrue();

    });

test('an authenticated user can edit a post via livewire component', function () {
    $this->refreshDatabase();

    $user = User::factory()->create();
    $this->actingAs($user);

    $post = Post::factory()->create([
        'message' => 'Original Content',
        'user_id' => $user->id,
    ]);

    Livewire::test(CrudPost::class, ['post' => $post])
        ->set('postForm.message', 'Updated Content')
        ->call('edit', $post->id)
        ->assertHasNoErrors();

    $post->refresh();

    expect($post->message)->toBe('Updated Content');
});
