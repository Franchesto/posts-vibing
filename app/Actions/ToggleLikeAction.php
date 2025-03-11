<?php

namespace App\Actions;

use App\Models;

class ToggleLikeAction
{
    public function __invoke(Models\Post $post, Models\User $user)
    {
        $post = Models\Post::where('id', $post->id)
            ->withExists(['likes as liked' => function ($query) use ($user) {
                $query->where('user_id', $user->id);
            }])
            ->first();

        return $post->liked
            ? Models\Like::where('post_id', $post->id)->where('user_id', $user->id)->delete()
            : Models\Like::create(['post_id' => $post->id, 'user_id' => $user->id]);
    }
}
