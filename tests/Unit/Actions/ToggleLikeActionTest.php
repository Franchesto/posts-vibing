<?php

use App\Actions\ToggleLikeAction;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;

it('correctly instantiates toggleLikeAction class', function () {
    // Arrange
    $user = User::factory()->create();
    $post = Post::factory()->create();
    $action = new ToggleLikeAction;

    // Act
    $result = $action($post, $user);

    // Assert
    expect($result)->toBeInstanceOf(Like::class)
        ->and(Like::where('post_id', $post->id)->where('user_id', $user->id)->exists())->toBeTrue()
        ->and($result->post_id)->toBe($post->id)
        ->and($result->user_id)->toBe($user->id);
});

it('can unlike a post when previously liked', function () {
    // Arrange
    $user = User::factory()->create();
    $post = Post::factory()->create();
    Like::create(['post_id' => $post->id, 'user_id' => $user->id]);
    $action = new ToggleLikeAction;

    // Act
    $result = $action($post, $user);

    // Assert
    expect($result)->toBe(1) // Number of deleted records
        ->and(Like::where('post_id', $post->id)->where('user_id', $user->id)->exists())->toBeFalse();
});

it('correctly toggles between like and unlike states', function () {
    // Arrange
    $user = User::factory()->create();
    $post = Post::factory()->create();
    $action = new ToggleLikeAction;

    // Act & Assert: First toggle (like)
    $firstToggle = $action($post, $user);
    expect(Like::count())->toBe(1);

    // Act & Assert: Second toggle (unlike)
    $secondToggle = $action($post, $user);
    expect(Like::count())->toBe(0);

    // Act & Assert: Third toggle (like again)
    $thirdToggle = $action($post, $user);
    expect(Like::count())->toBe(1);
});

it('handles non-existent post gracefully', function () {
    // Arrange
    $user = User::factory()->create();
    $post = new Post(['id' => 999]); // Non-existent post
    $action = new ToggleLikeAction;

    // Act & Assert
    expect(fn () => $action($post, $user))
        ->toThrow(Exception::class); // Or whatever specific exception your app throws
});
